<?php

namespace App\Domain\Store\Entities;

use Illuminate\Database\Eloquent\Model;

class Store is Model
{
    protected $fillable = ['name', 'address', 'active'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
