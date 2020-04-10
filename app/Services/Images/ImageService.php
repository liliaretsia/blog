<?php

namespace App\Services\Images;

use App\Entity\Image;
use App\Http\Requests\Admin\PhotosRequest;
use Illuminate\Support\Facades\DB;

class ImageService
{

    /**
     * @param $id
     * @param PhotosRequest $request
     * @throws \Throwable
     */
    public function addPhotos($id, PhotosRequest $request): void
    {
        $image = $this->getImage($id);

        DB::transaction(function () use ($request, $image) {
            foreach ($request['files'] as $file) {
                $image->photos()->create([
                    'file' => $file->store('images', 'public')
                ]);
            }
            $image->update();
        });
    }

    /**
     * @param $id
     * @return Image
     */
    private function getImage($id): Image
    {
        return Image::findOrFail($id);
    }
}
