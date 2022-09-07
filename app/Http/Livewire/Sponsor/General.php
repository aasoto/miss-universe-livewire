<?php

namespace App\Http\Livewire\Sponsor;

use App\Models\MuEdition;
use App\Models\SponsorCompany;
use App\Models\SponsorDetail;
use App\Models\SponsorGeneral;
use App\Models\SponsorPerson;
use Livewire\Component;

class General extends Component
{
    public $mu_edition_id;
    public $own_objective, $message, $type;
    //Pasos en el formulario por partes
    public $step = 1;
    public $pk;

    protected $listeners = ['stepEvent'];

    protected $rules = [
        'mu_edition_id' => 'required|integer',
        'own_objective' => 'nullable|string|max:500',
        'message' => 'nullable|string',
        'type' => 'required|string'
    ];

    public function render()
    {
        //dd(SponsorDetail::find(1)->general);
        //dd(SponsorGeneral::find(1)->detail);
        $mu_editions = MuEdition::pluck('id', 'official_name');
        return view('livewire.sponsor.general', compact('mu_editions'))->layout('layouts.sponsor');
    }

    public function submit()
    {
        $this->validate();

        if ($this->pk) {
            SponsorGeneral::where('id', $this->pk)->update([
                'mu_edition_id' => $this->mu_edition_id,
                'own_objective' => $this->own_objective,
                'message' => $this->message,
                'type' => $this->type
            ]);
        } else {
            $this->pk = SponsorGeneral::create([
                'mu_edition_id' => $this->mu_edition_id,
                'own_objective' => $this->own_objective,
                'message' => $this->message,
                'type' => $this->type
            ])->id;
        }

        $this->stepEvent(2);
    }

    /** EVENTOS */
    public function stepEvent($next_step)
    {
        if ($next_step == 2) {
            if ($this->type == "company") {
                $this->step = 2;
            } elseif($this->type == "person") {
                $this->step = 3;
            }
        } else {
            $this->step = $next_step;
        }
        $this->emit("parentId", $this->pk);

    }
}
