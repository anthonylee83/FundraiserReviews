<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fundraiser;
use App\Http\Requests\FundraiserRequest;

class FundraiserController extends Controller
{
    /** 
     * Lists all fundraisers by rating
     * @return fundraisers collection
     */
    public function index()
    {
        $fundraisers = Fundraiser::orderBy('rating', 'desc')->get();
        return view('fundraiser.index', compact('fundraisers'));
    }

    /**
     * displays infomration on a fundraiser
     * @param string $slug syste generated slug for a fundraiser 
     */
    public function show($slug)
    {
        $fundraiser = Fundraiser::where('slug', $slug)->first();
        $reviews = $fundraiser->reviews()->paginate(15);

        return view('fundraiser.show', compact('fundraiser', 'reviews'));
    }

    /**
     * Create a new fundraiser
     * Allows a user to create a new fundraiser
     */
    public function create()
    {
        return view('fundraiser.create');
    }

    /**
     * Stores the new fundraiser
     * @param FundraiserRequest $request Fundraiser submission request
     * @return Action $fundraiser returns an action redirect to the new fundraiser
     */
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

    /**
     * Serach for fundraisers
     * This handles search requests for async fundraiser searches
     * 
     * @param string $searchTerms search string to return data for.
     * @return fundraisers $fundraisers reutrns mattched fundraisers.
     */
    public function search($searchTerms)
    {
        //not very efficient but gets the job done for short notice.
        $fundraisers = Fundraiser::where('name', 'LIKE', '%' . $searchTerms . '%')->orWhere('location', 'LIKE', '%' . $searchTerms . '%')->take(5)->get();
        return $fundraisers;
    }
}
