<?php

namespace App\Http\Livewire\Dashboard\Editions\SecondRunnerUps;

use App\Models\Editions\MissUniverse;
use App\Models\Editions\SecondRunnerUp;
use Livewire\Component;

class Save extends Component
{
    protected $listeners = ['open_success_modal', 'second_runner_up_exists'];

    public $editions;

    public $edition_id, $edit_mode;

    public $second_runner_up, $success, $exist;

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->edition_id = SecondRunnerUp::where('id', $id)->get('edition_id');
            $this->edition_id = $this->edition_id[0]->edition_id;
            $this->edit_mode = true;
        }
    }

    public function render()
    {
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.second-runner-ups.save');
    }

    public function submit()
    {
        $this->emit('add_second_runner_up');
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

    public function second_runner_up_exists()
    {
        $this->exist = true;
    }

    public function close_exist_modal()
    {
        $this->exist = false;
    }
}
