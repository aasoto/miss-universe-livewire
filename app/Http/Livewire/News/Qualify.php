<?php

namespace App\Http\Livewire\News;

use App\Models\News;
use App\Models\NewsQualify;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class Qualify extends Component
{
    protected $listeners = ['QualifyAdded' => 'summation', 'QualifyModified' => 'summation', 'QualifyRemoved' => 'summation'];

    public $type = "list";

    public $news;
    public $qualifies;

    public $average = 0, $total_qualified = 0;
    public function summation()
    {
        if (auth()->check()) {
            $this->total_qualified = NewsQualify::where('user_id', auth()->id())->count();
            $this->average = NewsQualify::where('user_id', auth()->id())->sum('score') / $this->total_qualified;
            $this->average = round($this->average, 1);
        }
    }

    public function mount($news, $type = 'list')
    {
        $this->news = $news;
        $this->type = $type;

        $session = new Session();
        $this->qualifies = $session->get('qualifies', []);

    }

    public function render()
    {
        $this->summation();
        if ($this->type == 'list') {
            return view('livewire.news.qualify')->layout('layouts.web');
        } else {
            return view('livewire.news.qualify-add');
        }
    }
}
