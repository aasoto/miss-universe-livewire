<?php

namespace App\Http\Livewire\Dashboard\Editions\SpecialAwards;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\SpecialAward;
use Livewire\Component;
use Livewire\WithPagination;

class Contestants extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['add_special_award', 'close_modal'];

    public $contestants, $edition_id, $edit_mode, $contestant_special_award_id;
    public $confirming_special_award;
    public $special_award;

    public $columns = [
        'country_id' => 'País',
        '' => 'Nombre'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'name_award' => 'required|string|max:500',
        'contestant_special_award_id' => 'required|integer'
    ];

    public function mount($edition_id, $special_award_id, $edit_mode, $name_award)
    {
        $this->edition_id = $edition_id;
        $this->edit_model = $edit_mode;
        if (isset($edit_mode)) {
            $this->special_award = SpecialAward::where('id', $special_award_id)->get();
            $this->name_award = $name_award;
        } else {
            $this->name_award = $name_award;
        }
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.special-awards.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_special_award = true;
        $this->contestant_special_award_id = $contestant_id;
        //dd($this->contestant_special_award_id);
    }

    public function add_special_award()
    {
        $this->validate();

        $this->confirming_special_award = false;
        if ($this->edit_mode) {
            $this->special_award = SpecialAward::findOrFail($this->special_award[0]->id);
            $this->special_award->update([
                'name' => $this->name_award,
                'candidate_id' => $this->contestant_special_award_id,
                'edition_id' => $this->edition_id
            ]);
            $this->emit('open_success_modal');
        } else {
            $this->special_award = SpecialAward::create([
                'name' => $this->name_award,
                'candidate_id' => $this->contestant_special_award_id,
                'edition_id' => $this->edition_id
            ]);
            $this->emit('open_success_modal');
        }
    }

    public function close_modal()
    {
        $this->confirming_special_award = false;
    }
}
