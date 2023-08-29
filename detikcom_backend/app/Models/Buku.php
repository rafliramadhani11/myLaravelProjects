<?php

namespace App\Models;


use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori(): BelongsTo
    {
    return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
