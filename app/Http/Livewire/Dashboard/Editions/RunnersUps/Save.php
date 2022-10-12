<?php

namespace App\Http\Livewire\Dashboard\Editions\RunnersUps;

use App\Models\Editions\MissUniverse;
use Livewire\Component;

class Save extends Component
{
    protected $listeners = ['open_success_modal'];

    public $editions, $edition_id;

    public $success;

    public function render()
    {
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.runners-ups.save');
    }

    public function submit()
    {
        $this->emit('add_runner_up');
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
}
