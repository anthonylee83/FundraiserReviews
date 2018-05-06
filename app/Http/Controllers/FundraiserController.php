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
        return view('fundraiser.show', compact('fundraiser'));
    }

    public function create(){
        return view('fundraiser.create');
    }

    public function store(FundraiserRequest $request)
    {
        $fundraiser = Fundraiser::create($request->all(), ['slug'=>str_slug($request->name . " " . $request->location)]);
        return redirect()->action('FundraiserController@show', $fundraiser->slug);
    }
}
