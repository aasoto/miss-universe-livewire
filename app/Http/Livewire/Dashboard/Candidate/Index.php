<?php

namespace App\Http\Livewire\Dashboard\Candidate;

use App\Models\Candidate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmingDeleteCandidate, $candidateToDelete;

    public function render()
    {
        $candidates = Candidate::paginate(10);
        return view('livewire.dashboard.candidate.index', compact('candidates'));
    }

    public function selectedCandidateToDelete(Candidate $candidate)
    {
        $this->confirmingDeleteCandidate = true;
        $this->candidateToDelete = $candidate;
    }

    public function delete()
    {
        $this->confirmingDeleteCandidate = false;
        $this->candidateToDelete->delete();
        $this->emit('deleted');
    }
}
