<?php

namespace App\Http\Livewire\Web\Editions;

use App\Models\Editions\MissUniverse;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['searching'];

    public $editions, $search, $result_searching;

    public function render()
    {
        $this->editions = MissUniverse::get();
        for ($i=0; $i < count($this->editions); $i++) {
            $this->editions[$i]->description = str($this->editions[$i]->description)->substr(0, 250);
            $this->editions[$i]->description = $this->editions[$i]->description.'...</p>';
        }
        $this->editions = json_decode(json_encode($this->editions));
        return view('livewire.web.editions.index')->layout('layouts.web.layout');
    }

    public function searching($search)
    {
        $this->search = $search;
        $this->result_searching = MissUniverse::where( function ($query) {
            $query->orWhere('name', 'like', '%'.$this->search.'%')
            ->orWhere('official_name', 'like', '%'.$this->search.'%');
        })->get();
        $this->result_searching = json_decode(json_encode($this->result_searching));
    }
}
