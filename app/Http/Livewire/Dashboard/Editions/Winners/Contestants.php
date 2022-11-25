<?php

namespace App\Http\Livewire\Dashboard\Editions\Winners;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\Winner;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_winner', 'close_modal'];

    public $contestants, $edition_id, $contestant_winner_id;
    public $confirming_winner;
    public $winner, $edit_mode;

    public $columns = [
        'country_id' => 'Country',
        '' => 'Name'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_winner_id' => 'required|integer'
    ];

    public function mount($edition_id, $edit_mode)
    {
        $this->edition_id = $edition_id;
        $this->edit_mode = $edit_mode;
        $this->winner = Winner::where('edition_id', $this->edition_id)->get();
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.winners.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_winner = true;
        $this->contestant_winner_id = $contestant_id;
    }

    public function add_winner()
    {
        $this->validate();
        if (isset($this->winner[0])) {
            $this->confirming_winner = false;
            if ($this->edit_mode) {
                $this->winner = Winner::findOrFail($this->winner[0]->id);
                $this->winner->update([
                    'candidate_id' => $this->contestant_winner_id,
                    'edition_id' => $this->edition_id
                ]);
                $this->emit('open_success_modal');
            } else {
                $this->emit('winner_exist');
            }
        } else {
            $this->winner = Winner::create([
                'candidate_id' => $this->contestant_winner_id,
                'edition_id' => $this->edition_id
            ]);
            $this->confirming_winner = false;
            $this->emit('open_success_modal');
        }
    }

    public function close_modal()
    {
        $this->confirming_winner = false;
    }
}
