<?php

namespace App\Http\Livewire\Dashboard\Editions\Broadcaster;

use App\Models\Country;
use App\Models\Editions\Broadcaster;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $countries;

    public $name, $logo_light_theme, $logo_dark_theme, $description;
    public $current_logo_light_theme, $current_logo_dark_theme;

    public $country_id;

    public $broadcaster;

    public $flag, $send_button;

    protected $rules = [
        'country_id' => 'required|integer',
        'name' => 'required|max:200|string',
        'logo_light_theme' => 'nullable|image|mimes:jpeg,jpg,png,svg|max:10240',
        'logo_dark_theme' => 'nullable|image|mimes:jpeg,jpg,png,svg|max:10240',
        'description' => 'nullable|string'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->broadcaster = Broadcaster::findOrFail($id);
            $this->country_id = $this->broadcaster->country_id;
            $this->name = $this->broadcaster->name;
            $this->current_logo_light_theme = $this->broadcaster->logo_light_theme;
            $this->current_logo_dark_theme = $this->broadcaster->logo_dark_theme;
            $this->description = $this->broadcaster->description;
        }
    }

    public function render()
    {
        if ($this->country_id) {
            $this->flag = Country::where('id', $this->country_id)->get('iso3166_1_alpha2');
            $this->flag = $this->flag[0]->iso3166_1_alpha2;
        }

        $this->customize_send_button();

        $this->countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.editions.broadcaster.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'editions/broadcaster/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'editions/broadcaster/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }

    }

    public function submit()
    {
        $this -> validate();

        if ($this->broadcaster) {
            $this->broadcaster->update([
                'country_id' => $this->country_id,
                'name' => $this->name,
                'description' => $this->description
            ]);
            $this->emit('updated');
        } else {
            $this->broadcaster = Broadcaster::create([
                'country_id' => $this->country_id,
                'name' => $this->name,
                'logo_light_theme' => 'wait',
                'logo_dark_theme' => 'wait',
                'description' => $this->description
            ]);
            $this->emit('created');
        }

        if ($this->logo_light_theme) {
            $imageName = $this->broadcaster->id.'_broadcaster_light_theme_logo.'.$this->logo_light_theme->getClientOriginalExtension();
            $this->logo_light_theme->storeAs('images/editions/broadcasters', $imageName, 'public');

            $this->broadcaster->update([
                'logo_light_theme' => $imageName
            ]);
        }

        if ($this->logo_dark_theme) {
            $imageName = $this->broadcaster->id.'_broadcaster_dark_theme_logo.'.$this->logo_dark_theme->getClientOriginalExtension();
            $this->logo_dark_theme->storeAs('images/editions/broadcasters', $imageName, 'public');

            $this->broadcaster->update([
                'logo_dark_theme' => $imageName
            ]);
        }
    }
}
