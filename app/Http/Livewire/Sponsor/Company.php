<?php

namespace App\Http\Livewire\Sponsor;

use App\Models\SponsorCompany;
use Livewire\Component;

class Company extends Component
{
    protected $listeners = ['parentId'];
    public $parentId;

    public $business_name, $identification, $email, $web_site, $extra_information, $type;
    public $sponsor_general_id;

    public $rules = [
        'business_name' => 'required|string|max:500',
        'identification' => 'nullable|string|max:100',
        'email' => 'required|string|max:150',
        'web_site' => 'nullable|string|max:100',
        'extra_information' => 'nullable|string',
        'type' => 'required|string|max:100'
    ];

    public function render()
    {
        return view('livewire.sponsor.company');
    }

    public function submit()
    {

        $this -> validate();

        SponsorCompany::updateOrCreate(
            ['sponsor_general_id' => $this->parentId],
            [
                'business_name' => $this->business_name,
                'identification' => $this->identification,
                'email' => $this->email,
                'web_site' => $this->web_site,
                'extra_information' => $this->extra_information,
                'sponsor_general_id' => $this->parentId,
                'type' => $this->type
            ]
        );

        $this->emit('stepEvent', 4);
    }

    public function parentId($parentId)
    {
        $this->parentId = $parentId;
        $sponsor = SponsorCompany::where('sponsor_general_id', $this->parentId)->first();
        if ($sponsor != null) {
            $this->business_name = $sponsor->business_name;
            $this->identification = $sponsor->identification;
            $this->email = $sponsor->email;
            $this->web_site = $sponsor->web_site;
            $this->extra_information = $sponsor->extra_information;
            $this->type = $sponsor->type;
        }
    }
}
