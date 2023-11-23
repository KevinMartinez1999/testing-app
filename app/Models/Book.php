<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = []; // Permitir que todos los campos sean asignables

    public function scopeFindBySlug(Builder $query, string $slug)
    {
        return $query->where('slug', $slug)->FirstOrFail();
    }
}
