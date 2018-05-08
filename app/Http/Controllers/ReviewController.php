<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fundraiser;
use App\Http\Requests\ReviewRequest;
use App\Review;

class ReviewController extends Controller
{
    public function create($slug)
    {
        $fundraiser = Fundraiser::where('slug', $slug)->first();
        return view('review.create', compact('fundraiser'));
    }

    public function store($slug, ReviewRequest $request)
    {
        $status = '';
        try {
            //insert review here. In production would implement an email to go out to user to validate email
            $review = Review::firstOrCreate($request->validated(), ['hash'=>str_random()]);
            $review = 'Review Added Successfully!';

        } catch(\Exception $e) {
            //Check error to see if constraint failure occurred
            if($e->getCode() == 23000) {
                $status = 'You have already submitted a review for this fundraiser!';
            }else {
                $status = 'An error has occured, please try again.';
            }

        } finally {
            return redirect()->action('FundraiserController@show', $slug)->with('status', $status); 
        }
            
           
    }
}

