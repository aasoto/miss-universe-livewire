<?php

namespace App\Http\Livewire\Dashboard\Traits;

use Illuminate\Support\Facades\URL;

trait uploadImage
{

    public function resizeUploadImage($route, $name, $image, $height, $width){
        $route = $route.'/'.$name;
        $temp_name = 'temporal.'.$this->image->getClientOriginalExtension();
        $image->storeAs('images/_temp', $temp_name, 'public');

        list($ancho, $alto) = getimagesize(URL::asset('../storage/app/public/images/_temp/'.$temp_name));
        $nuevoAncho = $width;
        $nuevoAlto = $height;

        if (($image->guessExtension() == "jpeg") || ($image->guessExtension() == "jpg")) {

            $origen = imagecreatefromjpeg(URL::asset('../storage/app/public/images/_temp/'.$temp_name));
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $route);
        }

        if ($image->guessExtension() == "png") {

            $origen = imagecreatefrompng(URL::asset('../storage/app/public/images/_temp/'.$temp_name));
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagealphablending($destino, FALSE);
            imagesavealpha($destino, TRUE);
            imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $route);
        }
    }
}
