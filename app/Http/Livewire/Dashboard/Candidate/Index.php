<?php

namespace App\Http\Livewire\Dashboard\Candidate;

use App\Models\Candidate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $candidates = Candidate::paginate(10);
        return view('livewire.dashboard.candidate.index', compact('candidates'));
    }

    public function delete(Candidate $candidate)
    {
        $candidate->delete();
        $this->emit('deleted');
    }
}
