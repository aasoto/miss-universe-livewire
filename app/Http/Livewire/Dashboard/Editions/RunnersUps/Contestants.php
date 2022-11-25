<?php

namespace App\Http\Livewire\Dashboard\Editions\RunnersUps;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\RunnersUp;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_runner_up', 'close_modal'];

    public $contestants, $edition_id, $contestant_runner_up_id;
    public $confirming_runner_up;
    public $runner_up;

    public $columns = [
        'country_id' => 'Country',
        '' => 'Name'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_runner_up_id' => 'required|integer'
    ];

    public function mount($edition_id)
    {
        $this->edition_id = $edition_id;
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.runners-ups.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_runner_up = true;
        $this->contestant_runner_up_id = $contestant_id;
    }

    public function add_runner_up()
    {
        $this->validate();

        $this->runner_up = RunnersUp::create([
            'candidate_id' => $this->contestant_runner_up_id,
            'edition_id' => $this->edition_id
        ]);
        $this->confirming_runner_up = false;
        $this->emit('open_success_modal');
    }

    public function close_modal()
    {
        $this->confirming_runner_up = false;
    }
}
