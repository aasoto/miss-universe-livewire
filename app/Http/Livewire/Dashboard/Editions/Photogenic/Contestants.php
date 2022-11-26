<?php

namespace App\Http\Livewire\Dashboard\Editions\Photogenic;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Contestant;
use App\Models\Editions\Photogenic;
use Livewire\Component;

class Contestants extends Component
{
    use Order;

    protected $listeners = ['add_miss_photogenic', 'close_modal'];

    public $contestants, $edition_id, $edit_mode, $contestant_miss_photogenic_id;
    public $confirming_miss_photogenic;
    public $miss_photogenic;

    public $columns = [
        'country_id' => 'Country',
        '' => 'Name'
    ];

    protected $rules = [
        'edition_id' => 'required|integer',
        'contestant_miss_photogenic_id' => 'required|integer'
    ];

    public function mount($edition_id, $edit_mode)
    {
        $this->edition_id = $edition_id;
        $this->edit_model = $edit_mode;
        $this->miss_photogenic = Photogenic::where('edition_id', $this->edition_id)->get();
    }

    public function render()
    {
        $this->contestants = Contestant::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.photogenic.contestants');
    }

    public function confirmAction($contestant_id)
    {
        $this->confirming_miss_photogenic = true;
        $this->contestant_miss_photogenic_id = $contestant_id;
    }

    public function add_miss_photogenic()
    {
        $this->validate();

        if (isset($this->miss_photogenic[0])) {
            $this->confirming_miss_photogenic = false;
            if ($this->edit_mode) {
                $this->miss_photogenic = Photogenic::findOrFail($this->miss_photogenic[0]->id);
                $this->miss_photogenic->update([
                    'candidate_id' => $this->contestant_miss_photogenic_id,
                    'edition_id' => $this->edition_id
                ]);
                $this->emit('open_success_modal');
            } else {
                $this->emit('miss_photogenic_exists');
            }
        } else {
            $this->miss_photogenic = Photogenic::create([
                'candidate_id' => $this->contestant_miss_photogenic_id,
                'edition_id' => $this->edition_id
            ]);
            $this->confirming_miss_photogenic = false;
            $this->emit('open_success_modal');
        }
    }

    public function close_modal()
    {
        $this->confirming_miss_photogenic = false;
    }
}
