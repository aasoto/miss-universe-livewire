<?php

namespace App\Http\Livewire\Dashboard\Editions\Eighterfinalists;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\Eighterfinalist;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_eighterfinalist', 'close_modal'];

    public $contestants, $edition_id, $contestant_eighterfinalist_id;
    public $confirming_eighterfinalist;
    public $eighterfinalist;

    public $columns = [
        'country_id' => 'Country',
        '' => 'Name'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_eighterfinalist_id' => 'required|integer'
    ];

    public function mount($edition_id)
    {
        $this->edition_id = $edition_id;
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.eighterfinalists.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_eighterfinalist = true;
        $this->contestant_eighterfinalist_id = $contestant_id;
    }

    public function add_eighterfinalist()
    {
        $this->validate();

        $this->eighterfinalist = Eighterfinalist::create([
            'candidate_id' => $this->contestant_eighterfinalist_id,
            'edition_id' => $this->edition_id
        ]);
        $this->confirming_eighterfinalist = false;
        $this->emit('open_success_modal');
    }

    public function close_modal()
    {
        $this->confirming_eighterfinalist = false;
    }
}
