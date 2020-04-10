<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var array
     */
    protected $fillable = ['slug', 'header', 'content', 'photo_id'];

    public static function photosList()
    {
        $photos = Photo::all();
        $photosList = [];
        foreach ($photos as $photo) {
            $photosList[$photo->id] = $photo->file;
        }
        return $photosList;
    }

    public function photo()
    {
        return $this->hasOne('App\Entity\Photo', 'id', 'photo_id');
    }
}
