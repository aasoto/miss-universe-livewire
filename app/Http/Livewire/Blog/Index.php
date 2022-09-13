<?php

namespace App\Http\Livewire\Blog;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $queryString = ['type', 'category_id', 'posted', 'search', 'from', 'to'];

    //variables de filtros
    public $type, $category_id, $posted;

    //variable de la busqueda general
    public $search;

    //variables de filtrado por fechas
    public $from, $to;


    public function render()
    {
        $news = News::where('posted', 'yes');

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

        $news = $news->paginate(10);
        $categories = Category::pluck('id', 'name');

        return view('livewire.blog.index', compact('news', 'categories'))->layout('layouts.web');
    }
}
