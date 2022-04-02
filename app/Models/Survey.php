<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Survey extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'status',
        'description',
        'expired_at',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected function expiredAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }
}
