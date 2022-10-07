<?php

namespace App\Http\Livewire\Dashboard\Editions\Presenters;

use App\Models\Country;
use App\Models\Editions\Broadcaster;
use App\Models\editions\Presenter;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $broadcasters, $countries;

    public $name, $photo, $current_photo, $rol;

    public $broadcaster_id, $country_id;

    public $presenter;

    public $roles = [
        'main_show' => 'Show principal',
        'backstage' => 'Tras bambalinas',
        'prelims' => 'Preliminar',
        'national_costume' => 'Traje nacional',
        'other' => 'Otro'
    ];

    protected $rules = [
        'broadcaster_id' => 'nullable|integer',
        'country_id' => 'required|integer',
        'name' => 'required|max:200|string',
        'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        'rol' => 'required|max:200|string'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->presenter = Presenter::findOrFail($id);
            $this->broadcaster_id = $this->presenter->broadcaster_id;
            $this->country_id = $this->presenter->country_id;
            $this->name = $this->presenter->name;
            $this->current_photo = $this->presenter->photo;
            $this->rol = $this->presenter->rol;
        }
    }

    public function render()
    {
        $this->broadcasters = Broadcaster::pluck('id', 'name');
        $this->countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.editions.presenters.save');
    }

    public function submit()
    {
        $this -> validate();

        if ($this->presenter) {
            $this->presenter->update([
                'broadcaster_id' => $this->broadcaster_id,
                'country_id' => $this->country_id,
                'name' => $this->name,
                'rol' => $this->rol
            ]);
            $this->emit('updated');
        } else {
            $this->presenter = Presenter::create([
                'broadcaster_id' => $this->broadcaster_id,
                'country_id' => $this->country_id,
                'name' => $this->name,
                'rol' => $this->rol
            ]);
            $this->emit('created');
        }

        if ($this->photo) {
            $imageName = time().'.'.$this->photo->getClientOriginalExtension();
            $this->photo->storeAs('images/editions/presenters', $imageName, 'public');

            $this->presenter->update([
                'photo' => $imageName
            ]);

            if ($this->current_photo) {
                unlink('../storage/app/public/images/editions/presenters/'.$this->current_photo);
            }
        }
    }
}
