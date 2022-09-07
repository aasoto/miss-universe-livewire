<?php

namespace App\Http\Livewire\Dashboard\Carousel;

use App\Models\Carousel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmingDeleteCarousel, $carouselToDelete;

    public function render()
    {
        $carousels = Carousel::paginate(10);
        return view('livewire.dashboard.carousel.index', compact('carousels'));
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
}
