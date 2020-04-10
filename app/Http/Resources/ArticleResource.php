<?php

namespace App\Http\Resources\Advert;

use App\Entity\Image;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $slug
 * @property string $header
 * @property string $content
 * @property string $created_at

 * @property Image $photo
 */
class ArticleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'header' => $this->header,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'photo' => $this->photo->file,
        ];
    }
}
