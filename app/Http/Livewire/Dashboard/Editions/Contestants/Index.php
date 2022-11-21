<?php

namespace App\Http\Livewire\Dashboard\Editions\Contestants;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Editions\Contestant;
use App\Models\Editions\MissUniverse;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['candidate_id', 'edition_id', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $candidates, $editions;

    public $candidate_id, $edition_id;

    public $columns = [
        'id' => 'ID',
        '' => 'Año',
        'edition_id' => 'Edición',
        'candidate_id' => 'Nombre',
        '' => 'País'
    ];

    public $confirmingDeleteContestant, $contestantToDelete;

    public function render()
    {
        $this->candidates = Candidate::get();
        $this->editions = MissUniverse::pluck('id', 'name');
        $contestants = Contestant::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->candidate_id) {
            $contestants->where('candidate_id', $this->candidate_id);
        }

        if ($this->edition_id) {
            $contestants->where('edition_id', $this->edition_id);
        }

        $contestants = $contestants->paginate($this->pagination);
        return view('livewire.dashboard.editions.contestants.index', compact('contestants'))->layout('layouts.dashboard.pages');
    }

    public function selectedContestantToDelete(Contestant $contestant)
    {
        $this->confirmingDeleteContestant = true;
        $this->contestantToDelete = $contestant;
    }

    public function delete()
    {
        Candidate::where('id', $this->contestantToDelete->candidate_id)->update([
            'asigned' => false
        ]);
        $this->confirmingDeleteContestant = false;
        $this->contestantToDelete->delete();
        $this->emit('deleted');
    }
}
