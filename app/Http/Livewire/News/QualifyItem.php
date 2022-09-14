<?php

namespace App\Http\Livewire\News;

use Illuminate\Support\Arr;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class QualifyItem extends Component
{
    public $count;

    public $item;

    protected $listeners = ['addQualificationToQualifies' => 'add'];

    public function mount($newsId)
    {
        $session = new Session();
        $qualifies = $session->get('qualifies', []);

        if (Arr::exists($qualifies, $newsId)) {
            $this->item = $qualifies[$newsId];
            $this->count = $this->item[1];
        }
    }

    public function add($news, $count = 1)
    {
        $session = new Session();
        $qualifies = $session->get('qualifies', []);

        //eliminar
        if ($count <= 0) {
            if (Arr::exists($qualifies, $news['id'])) {
                unset($qualifies[$news['id']]);
                unset($this->item);
                $session->set('qualifies', $qualifies);
            }
            return;
        }
        //agregar
        if (Arr::exists($qualifies, $news['id'])) {
            $qualifies[$news['id']][1] = $count;
        } else {
            $qualifies[$news['id']] = [$news, $count];
        }

        $this->item = $qualifies[$news['id']];

        $this->count = $this->item[1];

        $session->set('qualifies', $qualifies);
        //dd($session->get('qualifies', []));
    }

    public function update()
    {
        $this->add($this->item[0], $this->count);
    }

    public function render()
    {
        return view('livewire.news.qualify-item');
    }
}
