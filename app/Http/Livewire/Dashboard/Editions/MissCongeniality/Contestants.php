<?php

namespace App\Http\Livewire\Dashboard\Editions\MissCongeniality;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\MissCongeniality;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_miss_congeniality', 'close_modal'];

    public $contestants, $edition_id, $edit_mode, $contestant_miss_congeniality_id;
    public $confirming_miss_congeniality;
    public $miss_congeniality;

    public $columns = [
        'country_id' => 'Country',
        '' => 'Name'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_miss_congeniality_id' => 'required|integer'
    ];

    public function mount($edition_id, $edit_mode)
    {
        $this->edition_id = $edition_id;
        $this->edit_model = $edit_mode;
        $this->miss_congeniality = MissCongeniality::where('edition_id', $this->edition_id)->get();
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.miss-congeniality.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_miss_congeniality = true;
        $this->contestant_miss_congeniality_id = $contestant_id;
    }

    public function add_miss_congeniality()
    {
        $this->validate();

        if (isset($this->miss_congeniality[0])) {
            $this->confirming_miss_congeniality = false;
            if ($this->edit_mode) {
                $this->miss_congeniality = MissCongeniality::findOrFail($this->miss_congeniality[0]->id);
                $this->miss_congeniality->update([
                    'candidate_id' => $this->contestant_miss_congeniality_id,
                    'edition_id' => $this->edition_id
                ]);
                $this->emit('open_success_modal');
            } else {
                $this->emit('miss_congeniality_exists');
            }
        } else {
            $this->miss_congeniality = MissCongeniality::create([
                'candidate_id' => $this->contestant_miss_congeniality_id,
                'edition_id' => $this->edition_id
            ]);
            $this->confirming_miss_congeniality = false;
            $this->emit('open_success_modal');
        }
    }

    public function close_modal()
    {
        $this->confirming_miss_congeniality = false;
    }
}
