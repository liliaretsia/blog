<?php

namespace App\Entity;

use App\Entity\Photo;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $path
 * @property string $content
 * @property int|null $tag_id
 *
 */
class Image extends Model
{
    /**
     * @var string
     */
    protected $table = 'images';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['content', 'tag_id'];

    public function tagsList()
    {
        $tags = Tag::all();
        $tagsList = [];
        foreach ($tags as $tag) {
            $tagsList[$tag->id] = $tag->name;
        }
        return $tagsList;
    }

    public function tags()
    {
        return $this->belongsToMany('App\Entity\Tag', 'images_tags_link');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'image_id', 'id');
    }
}
