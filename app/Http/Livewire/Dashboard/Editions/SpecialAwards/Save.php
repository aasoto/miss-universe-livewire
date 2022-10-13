<?php

namespace App\Http\Livewire\Dashboard\Editions\SpecialAwards;

use App\Models\Editions\MissUniverse;
use App\Models\Editions\SpecialAward;
use Livewire\Component;

class Save extends Component
{
    protected $listeners = ['open_success_modal'];

    public $editions;

    public $edition_id, $special_award_id, $edit_mode, $name_award;

    public $special_awards, $success;

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->special_award_id = $id;
            $this->special_awards = SpecialAward::where('id', $id)->get();
            $this->edition_id = $this->special_awards[0]->edition_id;
            $this->name_award = $this->special_awards[0]->name;
            $this->edit_mode = true;
        }
    }

    public function render()
    {
        // dd($this->name_award);
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.special-awards.save');
    }

    public function submit()
    {
        $this->emit('add_special_award', $this->name_award);
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

    public function close_exist_modal()
    {
        $this->exist = false;
    }
}
