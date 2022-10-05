<?php

namespace App\Http\Livewire\Dashboard\Editions\Broadcaster;

use App\Models\Country;
use App\Models\Editions\Broadcaster;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $countries;

    public $name, $logo;

    public $country_id;

    public $broadcaster;

    public $flag;

    protected $rules = [
        'country_id' => 'required|integer',
        'name' => 'required|max:200|string',
        'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:10240'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->broadcaster = Broadcaster::findOrFail($id);
            $this->country_id = $this->broadcaster->country_id;
            $this->name = $this->broadcaster->name;
            $this->logo = $this->broadcaster->logo;
        }
    }

    public function render()
    {
        if ($this->country_id) {
            $this->flag = Country::where('id', $this->country_id)->get('iso3166_1_alpha2');
            $this->flag = $this->flag[0]->iso3166_1_alpha2;
        }
        $this->countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.editions.broadcaster.save');
    }

    public function submit()
    {
        $this -> validate();

        if ($this->broadcaster) {
            $this->broadcaster->update([
                'country_id' => $this->country_id,
                'name' => $this->name
            ]);
            $this->emit('updated');
        } else {
            $this->broadcaster = Broadcaster::create([
                'country_id' => $this->country_id,
                'name' => $this->name,
                'logo' => 'wait'
            ]);
            $this->emit('created');
        }

        if ($this->logo) {
            $imageName = $this->broadcaster->id.'_broadcaster.'.$this->logo->getClientOriginalExtension();
            $this->logo->storeAs('images/editions/broadcasters', $imageName, 'public');

            $this->broadcaster->update([
                'logo' => $imageName
            ]);
        }
    }
}
