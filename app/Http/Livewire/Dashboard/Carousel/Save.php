<?php

namespace App\Http\Livewire\Dashboard\Carousel;

use App\Http\Livewire\Dashboard\Traits\customizeSendButton;
use App\Http\Livewire\Dashboard\Traits\uploadImage;
use App\Models\Carousel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;
    use uploadImage;
    use customizeSendButton;

    public $type;
    public $step = 1, $checked_images = false, $authorized = false;

    public $carousel;
    public  $image,
            $title,
            $subtitle,
            $secondary_image,
            $button_1_text,
            $button_1_type,
            $button_1_color,
            $button_1_link,
            $button_2_text,
            $button_2_type,
            $button_2_color,
            $button_2_link,
            $link_redirect;

    public $current_image, $current_secondary_image;

    public $send_button_color;

    protected $rules = [
        'type' => 'required|string|max:50',
        'image' => 'required|image|mimes:jpeg,jpg,png|max:10240',
        'title' => 'nullable|string|min:10|max:500',
        'subtitle' => 'nullable|string|min:10|max:700',
        'secondary_image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        'button_1_text' => 'nullable|string|max:50',
        'button_1_type' => 'nullable|string|max:100',
        'button_1_color' => 'nullable|string|max:2000',
        'button_1_link' => 'nullable|string|max:2000',
        'button_2_text' => 'nullable|string|max:50',
        'button_2_type' => 'nullable|string|max:100',
        'button_2_color' => 'nullable|string|max:2000',
        'button_2_link' => 'nullable|string|max:2000',
        'link_redirect' => 'nullable|string|max:2000'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->carousel = Carousel::findOrFail($id);
            $this->type = $this->carousel->type;
            $this->current_image = $this->carousel->image;
            $this->title = $this->carousel->title;
            $this->subtitle = $this->carousel->subtitle;
            $this->current_secondary_image = $this->carousel->secondary_image;
            $this->button_1_text = $this->carousel->button_1_text;
            $this->button_1_color = $this->carousel->button_1_color;
            $this->button_1_type = $this->carousel->button_1_type;
            $this->button_1_link = $this->carousel->button_1_link;
            $this->button_2_text = $this->carousel->button_2_text;
            $this->button_2_color = $this->carousel->button_2_color;
            $this->button_2_type = $this->carousel->button_2_type;
            $this->button_2_link = $this->carousel->button_2_link;
            $this->link_redirect = $this->carousel->link_redirect;
        }
    }

    public function render()
    {
        if (strpos(url()->current(), 'carousel/create')) {
            $this->send_button_color = 'bg-gradient-to-r from-lime-500 to-green-800';
        }
        if (strpos(url()->current(), 'carousel/edit')) {
            $this->send_button_color = 'bg-gradient-to-r from-yellow-500 to-orange-800';
        }
        return view('livewire.dashboard.carousel.save')->layout('layouts.dashboard.add.app');
    }

    public function submit(){

        if ($this->image != null) {

            $this->validate();

            $secondaryImageName = null;

            if ($this->checked_images == false) {
                if ($this->type == 'make' && $this->secondary_image != null) {
                    $imageName = 'carousel_background_'.time().'.'.$this->image->getClientOriginalExtension();
                    $this->resizeUploadImage('../storage/app/public/images/carousels/background', $imageName, $this->image, 945, 1920);
                    $secondaryImageName = 'carousel_secondary_image_'.time().'.'.$this->secondary_image->getClientOriginalExtension();
                    $this->resizeUploadImage('../storage/app/public/images/carousels/secondaries_images', $secondaryImageName, $this->secondary_image, 700, 700);

                    $this->checked_images = true;
                }
            }

            if ($this->checked_images == false) {
                $imageName = 'carousel_background_'.time().'.'.$this->image->getClientOriginalExtension();
                $this->resizeUploadImage('../storage/app/public/images/carousels/background', $imageName, $this->image, 945, 1920);

                $this->checked_images = true;
            }

            if ($this->button_1_color) {
                $this->button_1_type = 'default';
            }

            if ($this->button_2_color) {
                $this->button_2_type = 'default';
            }

        }

        if ($this->authorized) {
            if ($this->carousel) {
                $this->carousel->update([
                    'type' => $this->type,
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                    'button_1_text' => $this->button_1_text,
                    'button_1_type' => $this->button_1_type,
                    'button_1_color' => $this->button_1_color,
                    'button_1_link' => $this->button_1_link,
                    'button_2_text' => $this->button_2_text,
                    'button_2_type' => $this->button_2_type,
                    'button_2_color' => $this->button_2_color,
                    'button_2_link' => $this->button_2_link,
                    'link_redirect' => $this->link_redirect
                ]);

                if ($this->image != null) {
                    $this->carousel->update([
                        'image' => $imageName
                    ]);
                    unlink('../storage/app/public/images/carousels/background/'.$this->current_image);
                }

                if ($this->secondary_image != null) {

                    $this->carousel->update([
                        'secondary_image' => $secondaryImageName
                    ]);
                    unlink('../storage/app/public/images/carousels/secondaries_images/'.$this->current_secondary_image);
                }
                $this->emit('updated');

            } else {
                //dd($this->link_redirect);

                $this->carousel = Carousel::create([
                    'type' => $this->type,
                    'number' => Carousel::all()->count(),
                    'image' => $imageName,
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                    'secondary_image' => $secondaryImageName,
                    'button_1_text' => $this->button_1_text,
                    'button_1_type' => $this->button_1_type,
                    'button_1_color' => $this->button_1_color,
                    'button_1_link' => $this->button_1_link,
                    'button_2_text' => $this->button_2_text,
                    'button_2_type' => $this->button_2_type,
                    'button_2_color' => $this->button_2_color,
                    'button_2_link' => $this->button_2_link,
                    'link_redirect' => $this->link_redirect
                ]);
                $this->emit('created');
            }
        }


    }

    public function nextStep()
    {
        if ($this->type == "import") {
            $this->step = 2;
        }
        if ($this->type == "make") {
            $this->step = 3;
        }
    }

    public function previousStep(){
        $this->step = 1;
    }

    public function authorize_send ()
    {
        $this->authorized = true;
    }
}
