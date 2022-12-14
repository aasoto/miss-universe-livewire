<?php

namespace App\Http\Livewire\Dashboard\Editions\Eighterfinalists;

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
        return view('livewire.dashboard.editions.eighterfinalists.save')->layout('layouts.dashboard.add.app');
    }

    public function submit()
    {
        $this->emit('add_eighterfinalist');
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
