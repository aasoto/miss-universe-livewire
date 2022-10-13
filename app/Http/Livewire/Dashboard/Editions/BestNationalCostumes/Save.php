<?php

namespace App\Http\Livewire\Dashboard\Editions\BestNationalCostumes;

use App\Models\Editions\BestNationalCostume;
use App\Models\Editions\MissUniverse;
use Livewire\Component;

class Save extends Component
{
    protected $listeners = ['open_success_modal', 'best_national_costume_exists'];

    public $editions;

    public $edition_id, $edit_mode;

    public $best_national_costume, $success, $exist;

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->edition_id = BestNationalCostume::where('id', $id)->get('edition_id');
            $this->edition_id = $this->edition_id[0]->edition_id;
            $this->edit_mode = true;
        }
    }

    public function render()
    {
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.best-national-costumes.save');
    }

    public function submit()
    {
        $this->emit('add_best_national_costume');
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

    public function best_national_costume_exists()
    {
        $this->exist = true;
    }

    public function close_exist_modal()
    {
        $this->exist = false;
    }
}
