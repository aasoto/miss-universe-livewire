<?php

namespace App\Http\Livewire\Dashboard\Editions\SecondRunnerUps;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\SecondRunnerUp;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_second_runner_up', 'close_modal'];

    public $contestants, $edition_id, $edit_mode, $contestant_second_runner_up_id;
    public $confirming_second_runner_up;
    public $second_runner_up;

    public $columns = [
        'country_id' => 'País',
        '' => 'Nombre'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_second_runner_up_id' => 'required|integer'
    ];

    public function mount($edition_id, $edit_mode)
    {
        $this->edition_id = $edition_id;
        $this->edit_model = $edit_mode;
        $this->second_runner_up = SecondRunnerUp::where('edition_id', $this->edition_id)->get();
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.second-runner-ups.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_second_runner_up = true;
        $this->contestant_second_runner_up_id = $contestant_id;
    }

    public function add_second_runner_up()
    {
        $this->validate();

        if (isset($this->second_runner_up[0])) {
            $this->confirming_second_runner_up = false;
            if ($this->edit_mode) {
                $this->second_runner_up = SecondRunnerUp::findOrFail($this->second_runner_up[0]->id);
                $this->second_runner_up->update([
                    'candidate_id' => $this->contestant_second_runner_up_id,
                    'edition_id' => $this->edition_id
                ]);
                $this->emit('open_success_modal');
            } else {
                $this->emit('second_runner_up_exists');
            }
        } else {
            $this->second_runner_up = SecondRunnerUp::create([
                'candidate_id' => $this->contestant_second_runner_up_id,
                'edition_id' => $this->edition_id
            ]);
            $this->confirming_second_runner_up = false;
            $this->emit('open_success_modal');
        }
    }

    public function close_modal()
    {
        $this->confirming_second_runner_up = false;
    }
}
