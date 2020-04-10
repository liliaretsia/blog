<?php

namespace App\Http\Resources\Advert;

use App\Entity\Photo;
use App\Entity\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $content

 * @property Photo[]|Collection $photos
 * @property Tag[]|Collection $tags

 */
class ImageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'tags' => array_map(function (Tag $tag) {
                return $tag->name;
            }, $this->photos->toArray()),
            'photos' => array_map(function (Photo $photo) {
                return $photo->file;
            }, $this->photos->toArray()),
        ];
    }
}
