<?php

namespace App\Http\Livewire\Blog\Contact;

use App\Models\Contact;
use Livewire\Component;

class Detail extends Component
{
    protected $listeners = ['parentId'];

    public $parentId;

    public $detail, $agree;

    protected $rules = [
        'detail' => 'nullable|string|max:1000',
        'agree' => 'required|string|max:3'
    ];

    public function render()
    {
        return view('livewire.blog.contact.detail');
    }

    public function submit()
    {
        $this->validate();
        if ($this->agree == 'yes') {
            Contact::where('id', $this->parentId)->update([
                'detail' => $this->detail,
                'agree' => $this->agree
            ]);
        }else {
            $this->emit('not-agree');
        }
    }

    public function parentId($parentId)
    {
        $this->parentId = $parentId;
        $contact = Contact::where('id', $this->parentId)->first();
        if ($contact != null) {
            $this->detail = $contact->detail;
            $this->agree = $contact->agree;
        }
    }
}
