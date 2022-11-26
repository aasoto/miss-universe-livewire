<?php

namespace App\Http\Livewire\Dashboard\Editions\Photogenic;

use App\Models\Editions\MissUniverse;
use App\Models\Editions\Photogenic;
use Livewire\Component;

class Save extends Component
{
    protected $listeners = ['open_success_modal', 'miss_photogenic_exists'];

    public $editions;

    public $edition_id, $edit_mode;

    public $miss_photogenic, $success, $exist;

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->edition_id = Photogenic::where('id', $id)->get('edition_id');
            $this->edition_id = $this->edition_id[0]->edition_id;
            $this->edit_mode = true;
        }
    }

    public function render()
    {
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.photogenic.save')->layout('layouts.dashboard.add.app');
    }

    public function submit()
    {
        $this->emit('add_miss_photogenic');
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

    public function miss_photogenic_exists()
    {
        $this->exist = true;
    }

    public function close_exist_modal()
    {
        $this->exist = false;
    }
}
