<?php

namespace App\Entity;

use App\Entity\Tag;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property int $id
 * @property string $path
 * @property string $content
 * @property int|null $tag_id
 *
 */
class ImageTagLink extends Model
{
    /**
     * @var string
     */
    protected $table = 'images_tags_link';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['image_id', 'tag_id'];

}
