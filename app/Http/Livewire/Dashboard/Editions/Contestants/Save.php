<?php

namespace App\Http\Livewire\Dashboard\Editions\Contestants;

use App\Models\Candidate;
use App\Models\Editions\Contestant;
use App\Models\Editions\MissUniverse;
use Livewire\Component;

class Save extends Component
{
    public $candidates, $editions;

    public $candidate_id, $edition_id;

    public $contestant, $found, $candidate_found;

    public $send_button;

    protected $rules = [
        'candidate_id' => 'required|integer',
        'edition_id' => 'required|integer'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->contestant = Contestant::findOrFail($id);
            $this->candidate_id = $this->contestant->candidate_id;
            $this->edition_id = $this->contestant->edition_id;
            if($this->contestant) {
                $this->found = true;
                $this->candidate_found = Candidate::where('id', $this->candidate_id)->get();
            }
        }
    }

    public function render()
    {
        $this->customize_send_button();
        $this->candidates = Candidate::where('asigned', false)->get();
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.contestants.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'editions/contestant/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'editions/contestant/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function submit()
    {
        $this -> validate();

        if ($this->contestant) {
            $this->contestant->update([
                'candidate_id' => $this->candidate_id,
                'edition_id' => $this->edition_id
            ]);
            Candidate::where('id', $this->candidate_found[0]->id)->update([
                'asigned' => false
            ]);
            Candidate::where('id', $this->candidate_id)->update([
                'asigned' => true
            ]);
            $this->candidate_found = Candidate::where('id', $this->candidate_id)->get();
            $this->emit('updated');
        } else {
            $this->contestant = Contestant::create([
                'candidate_id' => $this->candidate_id,
                'edition_id' => $this->edition_id
            ]);
            Candidate::where('id', $this->candidate_id)->update([
                'asigned' => true
            ]);
            $this->emit('created');
        }
    }
}
