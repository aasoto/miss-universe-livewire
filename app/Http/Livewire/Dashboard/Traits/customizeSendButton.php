<?php

namespace App\Http\Livewire\Dashboard\Traits;

trait customizeSendButton
{
    public function send_button ($folder)
    {
        if (strpos(url()->current(), $folder.'/create')) {
            return 'bg-gradient-to-r from-lime-500 to-green-800';
        }
        if (strpos(url()->current(), $folder.'/edit')) {
            return 'bg-gradient-to-r from-yellow-500 to-orange-600';
        }
    }

    public function edition_send_button ($folder)
    {
        if (strpos(url()->current(), 'editions/'.$folder.'/create')) {
            return 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'editions/'.$folder.'/edit')) {
            return 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }
}
