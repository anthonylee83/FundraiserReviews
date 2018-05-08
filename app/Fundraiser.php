<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    protected $fillable = ['name', 'location', 'slug', 'rating'];

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
