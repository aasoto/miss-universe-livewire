<?php

namespace App\Http\Livewire\Dashboard\Editions\Semifinalists;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\Semifinalist;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_semifinalist', 'close_modal'];

    public $contestants, $edition_id, $contestant_semifinalist_id;
    public $confirming_semifinalist;
    public $semifinalist;

    public $columns = [
        'country_id' => 'Country',
        '' => 'Name'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_semifinalist_id' => 'required|integer'
    ];

    public function mount($edition_id)
    {
        $this->edition_id = $edition_id;
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.semifinalists.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_semifinalist = true;
        $this->contestant_semifinalist_id = $contestant_id;
    }

    public function add_semifinalist()
    {
        $this->validate();

        $this->semifinalist = Semifinalist::create([
            'candidate_id' => $this->contestant_semifinalist_id,
            'edition_id' => $this->edition_id
        ]);
        $this->confirming_semifinalist = false;
        $this->emit('open_success_modal');
    }

    public function close_modal()
    {
        $this->confirming_semifinalist = false;
    }
}
