<?php

namespace App\Http\Livewire\Dashboard\Editions\ThirdRunnerUps;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\ThirdRunnerUp;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_third_runner_up', 'close_modal'];

    public $contestants, $edition_id, $edit_mode, $contestant_third_runner_up_id;
    public $confirming_third_runner_up;
    public $third_runner_up;

    public $columns = [
        'country_id' => 'País',
        '' => 'Nombre'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_third_runner_up_id' => 'required|integer'
    ];

    public function mount($edition_id, $edit_mode)
    {
        $this->edition_id = $edition_id;
        $this->edit_model = $edit_mode;
        $this->third_runner_up = ThirdRunnerUp::where('edition_id', $this->edition_id)->get();
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.third-runner-ups.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_third_runner_up = true;
        $this->contestant_third_runner_up_id = $contestant_id;
    }

    public function add_third_runner_up()
    {
        $this->validate();

        if (isset($this->third_runner_up[0])) {
            $this->confirming_third_runner_up = false;
            if ($this->edit_mode) {
                $this->third_runner_up = ThirdRunnerUp::findOrFail($this->third_runner_up[0]->id);
                $this->third_runner_up->update([
                    'candidate_id' => $this->contestant_third_runner_up_id,
                    'edition_id' => $this->edition_id
                ]);
                $this->emit('open_success_modal');
            } else {
                $this->emit('third_runner_up_exists');
            }
        } else {
            $this->third_runner_up = ThirdRunnerUp::create([
                'candidate_id' => $this->contestant_third_runner_up_id,
                'edition_id' => $this->edition_id
            ]);
            $this->confirming_third_runner_up = false;
            $this->emit('open_success_modal');
        }
    }

    public function close_modal()
    {
        $this->confirming_third_runner_up = false;
    }
}
