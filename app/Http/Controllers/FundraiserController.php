<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fundraiser;
use App\Http\Requests\FundraiserRequest;

class FundraiserController extends Controller
{
    public function index()
    {
        $fundraisers = Fundraiser::all();
        return view('fundraiser.index', compact('fundraisers'));
    }

    public function show($slug)
    {
        $fundraiser = Fundraiser::where('slug', $slug)->first();
        $reviews = $fundraiser->reviews()->paginate(15);

        return view('fundraiser.show', compact('fundraiser', 'reviews'));
    }

    public function create()
    {
        return view('fundraiser.create');
    }

    public function store(FundraiserRequest $request)
    {
        $fundraiser = "";
        try{
            $fundraiser = Fundraiser::firstOrCreate($request->validated(), ['slug'=>str_slug($request->name . " " . $request->location)]);
        }catch(\Exception $e){
            if($e->getCode() == 23000) {
                $fundraiser = Fundraiser::where('name', $request->name)->where('location', $request->location)->first();
            }
        }
        return redirect()->action('FundraiserController@show', $fundraiser->slug);
    }

    public function search($searchTerms)
    {
        //not very efficient but gets the job done for short notice.
        $fundraisers = Fundraiser::where('name', 'LIKE', '%' . $searchTerms . '%')->orWhere('location', 'LIKE', '%' . $searchTerms . '%')->take(5)->get();
        return $fundraisers;
    }
}
