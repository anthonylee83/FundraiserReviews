<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(){
        return view('review.create');
    }

    public function store($slug, ReviewRequest $request){
        
    }
}

