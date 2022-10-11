<?php

namespace App\Http\Livewire\Dashboard\Editions\Winners;

use App\Models\Candidate;
use App\Models\Editions\Contestant;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Winner;
use Livewire\Component;

class Save extends Component
{
    protected $listeners = ['open_success_modal', 'winner_exist'];

    public $editions;

    public $edition_id, $edit_mode;

    public $winner, $success, $exist;

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->edition_id = Winner::where('id', $id)->get('edition_id');
            $this->edition_id = $this->edition_id[0]->edition_id;
            $this->edit_mode = true;
        }
    }

    public function render()
    {
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.winners.save');
    }

    public function submit()
    {
        $this->emit('add_winner');
    }

    public function close_confirming_modal()
    {
        $this->emit('close_modal');
    }

    public function open_success_modal()
    {
        $this->success = true;
    }

    public function close_success_modal()
    {
        $this->success = false;
    }

    public function winner_exist()
    {
        $this->exist = true;
    }

    public function close_exist_modal()
    {
        $this->exist = false;
    }
}
