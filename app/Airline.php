<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class Airline extends Model
{
    public function pullLogo()
    {
        $path = storage_path('app/public/airlines/');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true, true);
        }

        $logourl_128 = str_replace('/64/', '/128/', $this->logourl);
        $info = pathinfo($logourl_128);
        $contents = file_get_contents($logourl_128);
        $file = storage_path('app/public/airlines/' . $info['basename']);
        file_put_contents($file, $contents);
        $uploaded_file = new UploadedFile($file, $info['basename']);

        if ($uploaded_file->getError() == 0) {
            $logolocal_url = 'storge/airlines/' . $info['basename'];
            $this->logo = $logolocal_url;
            $this->save();
        }
    }
}
