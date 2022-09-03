<?php

namespace App\Http\Livewire\Dashboard\NationalCommittee;

use App\Models\NationalCommittee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $national_committees = NationalCommittee::paginate(10);
        return view('livewire.dashboard.national-committee.index', compact('national_committees'));
    }

    public function delete(NationalCommittee $nationalcommittee)
    {
        $nationalcommittee->delete();
        $this->emit('deleted');
    }
}
