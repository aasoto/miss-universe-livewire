<?php

namespace App\Http\Livewire\News;

use App\Models\NewsQualify;
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
                $this->saveDB($qualifies);
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
        $this->saveDB($qualifies);
        //dd($session->get('qualifies', []));
    }

    private function saveDB($qualifies)
    {
        if (auth()->check()) {
            $control = time();
            foreach ($qualifies as $qualify) {
                NewsQualify::updateOrCreate(
                    [
                        'news_id' => $qualify[0]['id'],
                        'user_id' => auth()->id()
                    ],[
                        'news_id' => $qualify[0]['id'],
                        'score' => $qualify[1],
                        'user_id' => auth()->id(),
                        'control' => $control
                    ]
                );
            }
        }
        //borrar
        NewsQualify::whereNot('control', $control)->where('user_id', auth()->id())->delete();
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
