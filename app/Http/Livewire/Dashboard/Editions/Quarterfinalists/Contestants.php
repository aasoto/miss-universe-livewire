<?php

namespace App\Http\Livewire\Dashboard\Editions\Quarterfinalists;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\Quarterfinalist;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_quarterfinalist', 'close_modal'];

    public $contestants, $edition_id, $contestant_quarterfinalist_id;
    public $confirming_quarterfinalist;
    public $quarterfinalist;

    public $columns = [
        'country_id' => 'Country',
        '' => 'Name'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_quarterfinalist_id' => 'required|integer'
    ];

    public function mount($edition_id)
    {
        $this->edition_id = $edition_id;
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.quarterfinalists.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_quarterfinalist = true;
        $this->contestant_quarterfinalist_id = $contestant_id;
    }

    public function add_quarterfinalist()
    {
        $this->validate();

        $this->quarterfinalist = Quarterfinalist::create([
            'candidate_id' => $this->contestant_quarterfinalist_id,
            'edition_id' => $this->edition_id
        ]);
        $this->confirming_quarterfinalist = false;
        $this->emit('open_success_modal');
    }

    public function close_modal()
    {
        $this->confirming_quarterfinalist = false;
    }
}
