<?php

namespace App\Http\Livewire\Dashboard\Editions\Presenters;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\MissUniversePresentatorInterception;
use App\Models\editions\Presenter;
use Livewire\Component;

class PresenterToEdition extends Component
{
    use Order;

    public $editions, $presenter;
    public $presenter_id, $edition_id;

    public $confirming_edition, $success;

    public $columns = [
        'year' => 'Year',
        'name' => 'Name',
        'official_name' => 'Official name',
        'broadcaster_id' => 'Broadcaster channel'
    ];

    public function mount($id = null)
    {
        $this->presenter_id = $id;
    }

    public function render()
    {
        $this->presenter = Presenter::where('id', $this->presenter_id)->get();
        $this->editions = MissUniverse::get();
        return view('livewire.dashboard.editions.presenters.presenter-to-edition')->layout('layouts.dashboard.add.app');
    }

    public function submit()
    {
        $this->presenter = MissUniversePresentatorInterception::create([
            'presenter_id' => $this->presenter_id,
            'edition_id' => $this->edition_id
        ]);
        $this->open_success_modal();
    }

    public function confirmAction($edition_id)
    {
        $this->edition_id = $edition_id;
        $this->confirming_edition = true;
    }

    public function close_confirming_modal()
    {
        $this->confirming_edition = false;
    }

    public function open_success_modal()
    {
        $this->close_confirming_modal();
        $this->success = true;
    }

    public function close_success_modal()
    {
        $this->success = false;
    }
}
