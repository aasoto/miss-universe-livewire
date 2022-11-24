<?php

namespace App\Http\Livewire\Dashboard\NationalCommittee;

use App\Models\Country;
use App\Models\NationalCommittee;
use Livewire\Component;

class Save extends Component
{
    public $countries;

    public $country_id, $business_name, $national_director;

    public $nationalcommittee;

    public $flag, $send_button;

    protected $rules = [
        'country_id' => 'required|integer',
        'business_name' => 'required|max:200|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
        'national_director' => 'required|string|max:200'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->nationalcommittee = NationalCommittee::findOrFail($id);
            $this->country_id = $this->nationalcommittee->country_id;
            $this->business_name = $this->nationalcommittee->business_name;
            $this->national_director = $this->nationalcommittee->national_director;
        }
    }

    public function render()
    {
        $this->customize_send_button();
        if ($this->country_id) {
            $this->flag = Country::where('id', $this->country_id)->get('iso3166_1_alpha2');
            $this->flag = $this->flag[0]->iso3166_1_alpha2;
        }
        $this->countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.national-committee.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'national-committee/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'national-committee/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function submit()
    {
        $this -> validate();

        if ($this->nationalcommittee) {
            $this->nationalcommittee->update([
                'country_id' => $this->country_id,
                'business_name' => $this->business_name,
                'national_director' => $this->national_director,
            ]);
            $this->emit('updated');
        } else {
            $this->nationalcommittee = NationalCommittee::create([
                'country_id' => $this->country_id,
                'business_name' => $this->business_name,
                'national_director' => $this->national_director,
            ]);
            $this->emit('created');
        }

    }
}
