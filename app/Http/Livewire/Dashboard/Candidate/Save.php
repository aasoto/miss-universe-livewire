<?php

namespace App\Http\Livewire\Dashboard\Candidate;

use App\Models\Candidate;
use App\Models\Country;
use App\Models\NationalCommittee;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $countries, $national_committees;

    public $first_name, $second_name, $first_last_name, $second_last_name, $hometown, $gender, $birthdate, $age, $official_picture;
    public $country_id, $national_committee_id;

    public $candidate;
    public $send_button;

    protected $rules = [
        'country_id' => 'required|integer',
        'first_name' => 'required|max:100|string',
        'second_name' => 'nullable|string|max:100',
        'first_last_name' => 'required|max:100|string',
        'second_last_name' => 'nullable|string|max:100',
        'hometown' => 'nullable|string|max:200',
        'gender' => 'required',
        'birthdate' => 'nullable|date',
        'age' => 'nullable|integer',
        'national_committee_id' => 'required|integer',
        'official_picture' => 'nullable|image|mimes:jpeg,jpg,png|max:10240'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->candidate = Candidate::findOrFail($id);
            $this->country_id = $this->candidate->country_id;
            $this->first_name = $this->candidate->first_name;
            $this->second_name = $this->candidate->second_name;
            $this->first_last_name = $this->candidate->first_last_name;
            $this->second_last_name = $this->candidate->second_last_name;
            $this->hometown = $this->candidate->hometown;
            $this->gender = $this->candidate->gender;
            $this->age = $this->candidate->age;
            $this->birthdate = $this->candidate->birthdate;
            $this->national_committee_id = $this->candidate->national_committee_id;
        }
    }

    public function render()
    {
        $this->customize_send_button();
        if($this->country_id) {
            $this->national_committees = NationalCommittee::where('country_id', $this->country_id)->get();
        } else {
            $this->national_committees = NationalCommittee::get();
        }
        $this->countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.candidate.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'candidate/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'candidate/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function submit()
    {

        $this -> validate();

        if ($this->candidate) {
            $this->candidate->update([
                'country_id' => $this->country_id,
                'first_name' => $this->first_name,
                'second_name' => $this->second_name,
                'first_last_name' => $this->first_last_name,
                'second_last_name' => $this->second_last_name,
                'hometown' => $this->hometown,
                'gender' => $this->gender,
                'birthdate' => $this->birthdate,
                'age' => $this->age,
                'national_committee_id' => $this->national_committee_id
            ]);
            $this->emit('updated');
        } else {
            $this->candidate = Candidate::create([
                'country_id' => $this->country_id,
                'first_name' => $this->first_name,
                'second_name' => $this->second_name,
                'first_last_name' => $this->first_last_name,
                'second_last_name' => $this->second_last_name,
                'hometown' => $this->hometown,
                'gender' => $this->gender,
                'birthdate' => $this->birthdate,
                'age' => $this->age,
                'national_committee_id' => $this->national_committee_id
            ]);
            $this->emit('created');
        }

        if ($this->official_picture) {
            $imageName = $this->candidate->id.'_'.$this->candidate->first_name.'_'.$this->candidate->first_last_name.'.'.$this->official_picture->getClientOriginalExtension();
            $this->official_picture->storeAs('images/candidates/official_pictures', $imageName, 'public');

            $this->candidate->update([
                'official_picture' => $imageName
            ]);
        }

    }
}
