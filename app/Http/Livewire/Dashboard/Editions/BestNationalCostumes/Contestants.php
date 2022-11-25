<?php

namespace App\Http\Livewire\Dashboard\Editions\BestNationalCostumes;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\BestNationalCostume;
use App\Models\Editions\Contestant;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_best_national_costume', 'close_modal'];

    public $contestants, $edition_id, $edit_mode, $contestant_best_national_costume_id;
    public $confirming_best_national_costume;
    public $best_national_costume;

    public $columns = [
        'country_id' => 'Country',
        '' => 'Name'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_best_national_costume_id' => 'required|integer'
    ];

    public function mount($edition_id, $edit_mode)
    {
        $this->edition_id = $edition_id;
        $this->edit_model = $edit_mode;
        $this->best_national_costume = BestNationalCostume::where('edition_id', $this->edition_id)->get();
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.best-national-costumes.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_best_national_costume = true;
        $this->contestant_best_national_costume_id = $contestant_id;
    }

    public function add_best_national_costume()
    {
        $this->validate();

        if (isset($this->best_national_costume[0])) {
            $this->confirming_best_national_costume = false;
            if ($this->edit_mode) {
                $this->best_national_costume = BestNationalCostume::findOrFail($this->best_national_costume[0]->id);
                $this->best_national_costume->update([
                    'candidate_id' => $this->contestant_best_national_costume_id,
                    'edition_id' => $this->edition_id
                ]);
                $this->emit('open_success_modal');
            } else {
                $this->emit('best_national_costume_exists');
            }
        } else {
            $this->best_national_costume = BestNationalCostume::create([
                'candidate_id' => $this->contestant_best_national_costume_id,
                'edition_id' => $this->edition_id
            ]);
            $this->confirming_best_national_costume = false;
            $this->emit('open_success_modal');
        }
    }

    public function close_modal()
    {
        $this->confirming_best_national_costume = false;
    }
}
