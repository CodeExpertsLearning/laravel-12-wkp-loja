<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadFiles
{
    protected function uploadMultiple(array $photos, string $folder, string $column, string $disk = 'public'): array
    {
        $photosCreate = [];

        foreach ($photos as $photo) {
            $photosCreate[] = [$column => $this->upload($photo, $folder, $disk)];
        }

        return $photosCreate;
    }

    protected function upload(UploadedFile $photo, string $folder, string $disk = 'public'): string|false
    {
        return  $photo->store($folder, $disk);
    }
}
