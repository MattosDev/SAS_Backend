<?php

namespace App\Domain\Book\Entities;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'ISBN', 'value'];

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }
}
