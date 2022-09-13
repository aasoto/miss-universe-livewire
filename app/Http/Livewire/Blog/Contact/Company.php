<?php

namespace App\Http\Livewire\Blog\Contact;

use App\Models\Contact;
use Livewire\Component;

class Company extends Component
{
    protected $listeners = ['parentId'];

    public $parentId;

    public $company_name, $person_name = null, $address, $email, $phone;

    public $data;

    protected $rules = [
        'company_name' => 'required|string|max:300',
        'address' => 'nullable|string|max:300',
        'email' => 'required|email|max:300',
        'phone' => 'required|string|max:300'
    ];

    public function render()
    {
        return view('livewire.blog.contact.company');
    }

    public function submit()
    {
        $this->validate();

        Contact::where('id', $this->parentId)->update([
            'company_name' => $this->company_name,
            'person_name' => $this->person_name,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone
        ]);

        $this->emit('stepEvent', 4);
    }

    public function parentId($parentId)
    {
        $this->parentId = $parentId;
        $contact = Contact::where('id', $this->parentId)->first();
        if ($contact != null) {
            $this->company_name = $contact->company_name;
            $this->address = $contact->address;
            $this->email = $contact->email;
            $this->phone = $contact->phone;
        }
    }

}
