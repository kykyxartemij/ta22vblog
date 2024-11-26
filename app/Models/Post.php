<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    // public function getSnippetAttribute(){
    //     return explode("\n\n", $this->body)[0];
    // }

    public function snippet(): Attribute {
        return Attribute::get(fn () => explode("\n\n", $this->body)[0]);
    }
    public function displayBody(): Attribute {
        return Attribute::get(fn () => nl2br($this->body));
    }
    public function displayImage(): Attribute {
        return Attribute::get(function () {
            if($this->image === null || parse_url($this->image, PHP_URL_SCHEME)){
                return $this->image;
            }
            return Storage::disk('public')->url($this->image);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        static::deleting(function (Post $post) {
            Storage::disk('public')->delete($post->image);
        });
    }
}
