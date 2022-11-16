<?php

namespace App\Http\Livewire\Dashboard\News;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Category;
use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    //trait de ordenación de columnas
    use Order;
    /**
     * Para mantener los filtros una vez se recargue la página web,
     * añadir variable queryString; por el contrario si se desea tener una busqueda volatil
     * omitir la variable queryString
     */
    protected $queryString = ['type', 'category_id', 'posted', 'search', 'from', 'to', 'pagination'];

    //variable paginate
    public $pagination = 10;

    //variables de filtros
    public $type, $category_id, $posted;

    //variable de la busqueda general
    public $search;

    //variables de filtrado por fechas
    public $from, $to;

    //Array de columnas de la tabla
    public $columns = [
        'id' => 'ID',
        'title' => 'Título',
        'subtitle' => 'Subtitulo',
        'date_publish' => 'F. Publicación',
        'posted' => 'Posteado',
        'type' => 'Tipo',
        'category_id' => 'Categoría'
    ];

    //variables para ordenar columnas
    #public $sortColumn = "id", $sortDirection = "asc";

    //variables para eliminar
    public $confirmingDeleteNews, $newsToDelete;

    public function render()
    {
        //consulta para traer registros ordenados según requerimiento
        $news = News::orderBy($this->sortColumn, $this->sortDirection);

        /** Busqueda general */
        if ($this->search) {
            $news->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('title', 'like', '%'.$this->search.'%')
                ->orWhere('subtitle', 'like', '%'.$this->search.'%');
            });
        }
        /** fin de Busqueda general */

        /** Busqueda por fechas */
        if ($this->from && $this->to) {
            $news->whereBetween('date_publish', [ date($this->from), date($this->to)]);
        }
        /** fin de Busqueda por fechas */

        /** Consultas de filtros */
        if ($this->type) {
            $news->where('type', $this->type);
        }
        if ($this->category_id) {
            $news->where('category_id', $this->category_id);
        }
        if ($this->posted) {
            $news->where('posted', $this->posted);
        }
        /** fin Consultas de filtros */

        $news = $news->paginate($this->pagination);
        $categories = Category::pluck('id', 'name');
        return view('livewire.dashboard.news.index', compact('news', 'categories'))->layout('layouts.dashboard.pages');
    }

    /** Funciones para eliminar */
    public function selectedNewsToDelete(News $news)
    {
        $this->confirmingDeleteNews = true;
        $this->newsToDelete = $news;
    }

    public function delete()
    {
        if ($this->newsToDelete->background != null) {
            unlink('../storage/app/public/images/news/background/'.$this->newsToDelete->background);
        }

        $this->confirmingDeleteNews = false;
        $this->newsToDelete->delete();
        $this->emit('deleted');
    }
    /** fin de Funciones para eliminar */

    /** Función para ordenar */
    /*public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }*/
    /** fin de Función para ordenar */
}
