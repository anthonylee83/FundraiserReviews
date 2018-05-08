<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'email', 'rating', 'review', 'fundraiser_id', 'hash'];

    public function fundraiser()
    {
        return $this->belongsTo('App\Fundraiser');
    }

    public function display_rating()
    {
        $stars = $this->rating;
        for($i = 0; $i < 5; $i++) {
            if($stars > 0) {
                print('<i class="fas fa-star fa-star-selected"></i>');
                $stars--;
            }else{
                print('<i class="fas fa-star"></i>');
            }
        }
        
    }
}
