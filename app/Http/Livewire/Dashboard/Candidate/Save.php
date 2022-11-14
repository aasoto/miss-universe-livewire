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

    public $first_name, $second_name, $first_last_name, $second_last_name, $gender, $birthdate, $official_picture;
    public $country_id, $national_committee_id;

    public $candidate;

    protected $rules = [
        'country_id' => 'required|integer',
        'first_name' => 'required|max:100|string',
        'second_name' => 'nullable|string|max:100',
        'first_last_name' => 'required|max:100|string',
        'second_last_name' => 'nullable|string|max:100',
        'gender' => 'required',
        'birthdate' => 'required|date',
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
            $this->gender = $this->candidate->gender;
            $this->birthdate = $this->candidate->birthdate;
            $this->national_committee_id = $this->candidate->national_committee_id;
        }
    }

    public function render()
    {
        if($this->country_id) {
            $this->national_committees = NationalCommittee::where('country_id', $this->country_id)->get();
        } else {
            $this->national_committees = NationalCommittee::get();
        }
        $this->countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.candidate.save')->layout('layouts.dashboard.add.app');
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
                'gender' => $this->gender,
                'birthdate' => $this->birthdate,
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
                'gender' => $this->gender,
                'birthdate' => $this->birthdate,
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
