@extends('layouts.app')

@section('content')
<section id="main-jumbotron" class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Search Fundraisers</h1>
      <p class="lead">Search for a specific fundraiser or browse below to find a fundraiser!</p>
      <p>
          <div class="input-group search">
            <input class="form-control" type="search" area-label="Search Fundraisers." />
            <div class="input-group-append">
                <button class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
            </div>
         </div>
      </p>
    </div>
    </div>
    </div>
  </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
    @forelse($fundraisers as $fundraiser)
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$fundraiser->name}}</h4>
              <p class="card-text">{{$fundraiser->location}}</p>
            </div>
            <div class="card-footer">
              <a href="{{action('FundraiserController@show', $fundraiser->slug)}}" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
    @empty
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">No Fundraisers Found</h4>
              <p class="card-text">No fundraisers were found!</p>
            </div>
            <div class="card-footer">
              <a href="{{action('FundraiserController@create')}}" class="btn btn-primary">Create Event?</a>
            </div>
          </div>
        </div>
    @endforelse
@endsection