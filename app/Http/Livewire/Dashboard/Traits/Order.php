<?php

namespace App\Http\Livewire\Dashboard\Traits;

trait Order
{
    /** Variables de ordenamiento */
    public $sortColumn = "id", $sortDirection = "asc";

    /** Función para ordenar */
    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }
    /** fin de Función para ordenar */
}
