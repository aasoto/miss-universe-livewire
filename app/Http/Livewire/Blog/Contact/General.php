<?php

namespace App\Http\Livewire\Blog\Contact;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Type;
use Livewire\Component;

class General extends Component
{
    protected $listeners = ['stepEvent'];

    public $step = 1;

    public $pk;

    public $country_id, $type_id;

    public $countries, $types;

    protected $rules = [
        'country_id' => 'required|integer',
        'type_id' => 'required|integer'
    ];

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->types = Type::pluck('id', 'interested');
        return view('livewire.blog.contact.general');
    }

    public function submit()
    {
        $this->validate();
        if ($this->pk) {
            Contact::where('id', $this->pk)->update([
                'country_id' => $this->country_id,
                'type_id' => $this->type_id
            ]);
        } else {
            $this->pk = Contact::create([
                'country_id' => $this->country_id,
                'type_id' => $this->type_id
            ])->id;
        }

        $this->stepEvent(2);
    }

    public function stepEvent($next_step)
    {
        if ($next_step == 2) {
            $next_type = Type::where('id', $this->type_id)->first();
            if ($next_type->interested == "Company") {
                $this->step = 2;
            } elseif($next_type->interested == "Person") {
                $this->step = 3;
            }
            $this->emit('previousData', $this->country_id, $this->type_id);
        } else {
            $this->step = $next_step;
        }
        $this->emit('parentId', $this->pk);
    }

}
