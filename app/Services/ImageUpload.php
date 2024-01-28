<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class ImageUpload
{
    public function upload(UploadedFile $file, $directory): string|null {
        if (!\Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }

        return Storage::disk('public')->put($directory, $file) ?? null;
    }
}


