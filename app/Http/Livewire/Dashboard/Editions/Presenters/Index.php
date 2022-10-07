<?php

namespace App\Http\Livewire\Dashboard\Editions\Presenters;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\Broadcaster;
use App\Models\editions\Presenter;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['broadcaster_id', 'country_id', 'search', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $search;

    public $broadcasters, $countries;

    public $broadcaster_id, $country_id;

    public $roles = [
        'main_show' => 'Show principal',
        'backstage' => 'Tras bambalinas',
        'prelims' => 'Preliminar',
        'national_costume' => 'Traje nacional',
        'other' => 'Otro'
    ];

    public $columns = [
        'id' => 'ID',
        'name' => 'Nombre',
        'country_id' => 'País',
        'broadcaster_id' => 'Canal',
        'rol' => 'Rol'
    ];

    public $confirmingDeletePresenter, $presenterToDelete;

    public function render()
    {
        $this->broadcasters = Broadcaster::pluck('id', 'name');
        $this->countries = Country::pluck('id', 'name');
        $presenters = Presenter::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $presenters->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('rol', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->broadcaster_id) {
            $presenters->where('broadcaster_id', $this->broadcaster_id);
        }

        if ($this->country_id) {
            $presenters->where('country_id', $this->country_id);
        }

        $presenters =$presenters->paginate($this->pagination);

        return view('livewire.dashboard.editions.presenters.index', compact('presenters'));
    }

    public function selectedPresenterToDelete(Presenter $presenter)
    {
        $this->confirmingDeletePresenter = true;
        $this->presenterToDelete = $presenter;
    }

    public function delete()
    {
        $this->confirmingDeletePresenter = false;
        $this->presenterToDelete->delete();
        $this->emit('deleted');
    }
}
