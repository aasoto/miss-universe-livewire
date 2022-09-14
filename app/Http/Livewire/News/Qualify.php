<?php

namespace App\Http\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class Qualify extends Component
{
    public $type = "list";

    public $news;
    public $qualifies;

    public function mount($news, $type = 'list')
    {
        $this->news = $news;
        $this->type = $type;

        $session = new Session();
        $this->qualifies = $session->get('qualifies', []);

    }

    public function render()
    {
        if ($this->type == 'list') {
            return view('livewire.news.qualify')->layout('layouts.web');
        } else {
            return view('livewire.news.qualify-add');
        }
    }
}
