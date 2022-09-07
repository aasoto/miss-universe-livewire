<?php

namespace App\Http\Livewire\Sponsor;

use App\Models\SponsorDetail;
use Livewire\Component;

class Detail extends Component
{
    protected $listeners = ['parentId'];
    public $parentId;

    public $extra, $sponsor_general_id;

    public $rules = [
        'extra' => 'nullable|string'
    ];

    public function render()
    {
        return view('livewire.sponsor.detail');
    }

    public function submit()
    {
        $this->validate();

        SponsorDetail::updateOrCreate(
            ['sponsor_general_id' => $this->parentId],
            [
                'extra' => $this->extra,
                'sponsor_general_id' => $this->parentId
            ]
        );
        //$this->emit('stepEvent', 5);
    }

    public function parentId($parentId)
    {
        $this->parentId = $parentId;
        $sponsor = SponsorDetail::where('sponsor_general_id', $this->parentId)->first();
        if ($sponsor != null) {
            $this->extra = $sponsor->extra;
        }
    }
}
