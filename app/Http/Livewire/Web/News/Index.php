<?php

namespace App\Http\Livewire\Web\News;

use App\Models\News;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ["searching", "show_page"];

    public $news, $search, $result_searching, $count, $last_id, $pages, $current_page = "[", $next_id, $count_pages, $num_results = 10;

    public function render()
    {
        if ($this->news == null) {
            $this->news = News::orderBy('id', 'desc')->take(1)->get();
            $this->show_page($this->news[0]->id, $this->current_page);
        }

        $this->count = News::count();
        $this->pagination($this->count, $this->num_results);

        $this->last_id = News::select('id')->orderByDesc('id')->first();
        $this->paginate($this->last_id->id);

        return view('livewire.web.news.index')->layout('layouts.web.layout');
    }

    public function searching($search)
    {
        $this->search = $search;
        $this->result_searching = News::where( function ($query) {
            $query->orWhere('title', 'like', '%'.$this->search.'%')
            ->orWhere('subtitle', 'like', '%'.$this->search.'%')
            ->orWhere('content', 'like', '%'.$this->search.'%');
        })->get();
        for ($i=0; $i < count($this->result_searching); $i++) {
            $this->result_searching[$i]->content = str($this->result_searching[$i]->content)->substr(0, 250).'...';
        }
        $this->result_searching = json_decode(json_encode($this->result_searching));
    }

    public function show_page($next_id, $current_page)
    {
        $this->current_page = $current_page;
        if ($this->search == null) {
            for ($i=0; $i < $this->num_results; $i++) {
                $not_found = true;
                do {
                    $success = News::findOrFail($next_id);
                    if ($success) {
                        if ($i != ($this->num_results - 1)) {
                            $result = News::where('id', $next_id)->get();
                            $this->current_page = $this->current_page.'{"id":"'.$result[0]->id.'","title":"'.$result[0]->title.'","subtitle":"'.$result[0]->subtitle.'","slug":"'.$result[0]->slug.'","background":"'.$result[0]->background.'"},';
                        } else {
                            $result = News::where('id', $next_id)->get();
                            $this->current_page = $this->current_page.'{"id":"'.$result[0]->id.'","title":"'.$result[0]->title.'","subtitle":"'.$result[0]->subtitle.'","slug":"'.$result[0]->slug.'","background":"'.$result[0]->background.'"}';
                        }
                        $next_id--;
                        $not_found = false;
                    } else {
                        $next_id--;
                    }
                } while ($not_found);
            }
            $this->current_page = $this->current_page.']';
            $this->current_page = json_decode($this->current_page);
            $this->next_id = $next_id;
        }
    }

    public function pagination($total, $num_x_pag)
    {
        $this->pages = ceil($total / $num_x_pag);
    }

    public function paginate($count)
    {
        $this->count_pages = '[';
        for ($i=1; $i <= $this->pages; $i++) {
            if ($i != $this->pages) {
                $this->count_pages = $this->count_pages.'{"current":"'.$i.'","jump":"'.$count.'"},';
            } else {
                $this->count_pages = $this->count_pages.'{"current":"'.$i.'","jump":"'.$count.'"}';
            }
            for ($j=0; $j < $this->num_results; $j++) {
                $not_found = true;
                do {
                    $success = News::findOrFail($count);
                    if ($success) {
                        $count--;
                        $not_found = false;
                    } else {
                        $count--;
                    }
                } while ($not_found);
            }
        }
        $this->count_pages = $this->count_pages.']';
        $this->count_pages = json_decode($this->count_pages);
    }
}
