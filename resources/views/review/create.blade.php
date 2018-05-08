@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-xs-12 col-8 justify-content-center">
        <h1>New Review For {{$fundraiser->name}}</h1>
        <form action="{{action('ReviewController@store', $fundraiser->slug)}}" method="post">

            {{csrf_field()}}
            <input type="hidden" name="fundraiser_id" value="{{$fundraiser->id}}" />
            <!-- Rating -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required="required"
                @if(count($errors) > 0) value="{{old('name')}}" @endif />
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" 
                    name="email" required="required" @if(count($errors) > 0) value="{{old('email')}}" @endif />
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
            <!-- Rating -->
            <div class="form-group">
                <label for="rating">Rating</label>
                <rating></rating>
                @if($errors->has('rating'))
                    <div class="invalid-feedback">{{$errors->first('rating')}}</div>
                @endif
            </div>
            <!-- Review -->
            <div class="form-group">
                <label for="review">Review</label>
                <textarea class="form-control {{$errors->has('review') ? 'is-invalid' : ''}}" name="review" required="required" />
                    @if(count($errors) > 0)
                        {{trim(old('review'))}}
                    @endif
                </textarea>
                @if($errors->has('review'))
                    <div class="invalid-feedback">{{$errors->first('review')}}</div>
                @endif
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Add Review</button>
            </div>
        </form>
    </div>
</div>
@endsection