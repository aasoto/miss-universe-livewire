<?php

namespace App\Http\Livewire\Sponsor;

use App\Models\SponsorPerson;
use Livewire\Component;

class Person extends Component
{
    protected $listeners = ['parentId'];
    public $parentId;

    public $name, $surname, $email, $web_site, $extra_information, $type;
    public $sponsor_general_id;

    protected $rules = [
        'name' => 'required|string|max:500',
        'surname' => 'nullable|string|max:100',
        'email' => 'required|string|max:150',
        'web_site' => 'nullable|string|max:100',
        'extra_information' => 'nullable|string|max:1000',
        'type' => 'required|string|max:100'
    ];

    public function render()
    {
        return view('livewire.sponsor.person');
    }

    public function submit()
    {
        $this->validate();

        SponsorPerson::updateOrCreate(
            ['sponsor_general_id' => $this->parentId],
            [
                'name' => $this->name,
                'surname' => $this->surname,
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
        $sponsor = SponsorPerson::where('sponsor_general_id', $this->parentId)->first();
        if ($sponsor != null) {
            $this->name = $sponsor->name;
            $this->surname = $sponsor->surname;
            $this->email = $sponsor->email;
            $this->web_site = $sponsor->web_site;
            $this->extra_information = $sponsor->extra_information;
            $this->type = $sponsor->type;
        }
    }
}
