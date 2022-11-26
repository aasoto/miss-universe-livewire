<?php

namespace App\Http\Livewire\Dashboard\Owner;

use App\Models\Country;
use App\Models\Owner;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $countries;

    public $business_name, $logo_light_theme, $logo_dark_theme, $description, $owner_name, $owner_occupation, $owner_picture;
    public $logo_light_theme_route, $logo_dark_theme_route, $owner_picture_route;
    public $country_id;

    public $owner;
    public $send_button;

    protected $rules = [
        'business_name' => 'required|max:300|string',
        'logo_light_theme' => 'nullable|image|mimes:jpeg,jpg,png,svg|max:10240',
        'logo_dark_theme' => 'nullable|image|mimes:jpeg,jpg,png,svg|max:10240',
        'country_id' => 'required|integer',
        'description' => 'required|string',
        'owner_name' => 'nullable|max:100|string',
        'owner_occupation' => 'nullable|string|max:1000',
        'owner_picture' => 'nullable|image|mimes:jpeg,jpg,png,svg|max:10240'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->owner = Owner::findOrFail($id);
            $this->business_name = $this->owner->business_name;
            $this->logo_light_theme_route = $this->owner->logo_light_theme;
            $this->logo_dark_theme_route = $this->owner->logo_dark_theme;
            $this->country_id = $this->owner->country_id;
            $this->description = $this->owner->description;
            $this->owner_name = $this->owner->owner_name;
            $this->owner_occupation = $this->owner->owner_occupation;
            $this->owner_picture_route = $this->owner->owner_picture;
        }
    }

    public function render()
    {
        $this->customize_send_button();
        $this->countries = Country::pluck('id', 'name');

        return view('livewire.dashboard.owner.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'owner/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'owner/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function submit()
    {
        $this -> validate();

        if ($this->owner) {
            $this->owner->update([
                'business_name' => $this->business_name,
                'country_id' => $this->country_id,
                'description' => $this->description,
                'owner_name' => $this->owner_name,
                'owner_occupation' => $this->owner_occupation
            ]);
            $this->emit('updated');
        } else {
            $this->owner = Owner::create([
                'business_name' => $this->business_name,
                'country_id' => $this->country_id,
                'description' => $this->description,
                'owner_name' => $this->owner_name,
                'owner_occupation' => $this->owner_occupation
            ]);
            $this->emit('created');
        }

        $image_logo_light_theme = $this->logo_light_theme_route;
        $image_logo_dark_theme = $this->logo_dark_theme_route;
        $image_owner_picture = $this->owner_picture_route;

        if ($this->logo_light_theme) {
            $image_logo_light_theme = $this->owner->id.'_'.$this->owner->business_name.'_logo_light.'.$this->logo_light_theme->getClientOriginalExtension();
            $this->logo_light_theme->storeAs('images/owners/logo', $image_logo_light_theme, 'public');
        }

        if ($this->logo_dark_theme) {
            $image_logo_dark_theme = $this->owner->id.'_'.$this->owner->business_name.'_logo_dark.'.$this->logo_dark_theme->getClientOriginalExtension();
            $this->logo_dark_theme->storeAs('images/owners/logo', $image_logo_dark_theme, 'public');
        }

        if ($this->owner_picture) {
            $image_owner_picture = $this->owner->id.'_'.$this->owner->business_name.'_owner_picture.'.$this->owner_picture->getClientOriginalExtension();
            $this->owner_picture->storeAs('images/owners/pictures', $image_owner_picture, 'public');
        }

        if ($this->logo_light_theme || $this->logo_dark_theme || $this->owner_picture) {
            $this->owner->update([
                'logo_light_theme' => $image_logo_light_theme,
                'logo_dark_theme' => $image_logo_dark_theme,
                'owner_picture' => $image_owner_picture
            ]);
        }
    }
}
