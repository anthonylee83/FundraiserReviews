@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('status') !== null)
        <div class="alert alert-secondary">{{session('status')}}</div>
    @endif
    <h1>{{$fundraiser->name}}</h1>
        <h3>{{$fundraiser->location}}</h3>

    <h2>Reviews</h2>
        <div class="text-right">
            <a href="{{action('ReviewController@create', $fundraiser->slug)}}" class="btn btn-primary new-button">New Review</a>    
        </div>
        @forelse($reviews as $review)
            @include('review.partials.show', ['review' => $review])
            {{$reviews->links()}}
        @empty
            @include('review.partials.empty')
        @endforelse
</div>
@endsection