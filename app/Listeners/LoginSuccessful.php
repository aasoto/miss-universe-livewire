<?php

namespace App\Listeners;

use App\Models\NewsQualify;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function add($news, $count = 1)
    {
        $qualifies = $this->session->get('qualifies', []);

        //eliminar
        if ($count <= 0) {
            if (Arr::exists($qualifies, $news['id'])) {
                unset($qualifies[$news['id']]);
                unset($this->item);
                $this->session->set('qualifies', $qualifies);
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
        $this->session->set('qualifies', $qualifies);
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $qualifies = NewsQualify::where('user_id', auth()->id())->get();
        $this->session->set('qualifies', []);

        foreach ($qualifies as $qualify) {
            $this->add($qualify->news, $qualify->score);
        }
    }
}
