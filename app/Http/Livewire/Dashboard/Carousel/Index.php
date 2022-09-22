<?php

namespace App\Http\Livewire\Dashboard\Carousel;

use App\Models\Carousel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['setOrden', 'selectedCarouselToDelete', 'delete', 'update', 'status'];

    public $carousels;
    public $confirmingDeleteCarousel, $carouselToDelete;

    public function render()
    {
        //$carousels = Carousel::paginate(10);
        $this->carousels = Carousel::orderBy('number')->get()->toArray();
        return view('livewire.dashboard.carousel.index');
    }

    public function setOrden()
    {
        foreach ($this->carousels as $number => $carousel) {
            Carousel::where("id", $carousel['id'])->update(['number' => $number]);
        }
    }

    public function selectedCarouselToDelete(Carousel $carousel)
    {
        $this->confirmingDeleteCarousel = true;
        $this->carouselToDelete = $carousel;
    }

    public function delete()
    {
        if ($this->carouselToDelete->image != null) {
            unlink('../storage/app/public/images/carousels/background/'.$this->carouselToDelete->image);
        }

        if ($this->carouselToDelete->secondary_image != null) {
            unlink('../storage/app/public/images/carousels/secondaries_images/'.$this->carouselToDelete->secondary_image);
        }

        $this->confirmingDeleteCarousel = false;
        $this->carouselToDelete->delete();
        $this->emit('deleted');
    }

    public function update($carousel)
    {
        Carousel::where("id", $carousel['id'])->update(['title' => $carousel['title']]);
    }

    public function status($id, $status)
    {
        Carousel::where("id", $id)->update(['visible' => $status]);
    }
}
