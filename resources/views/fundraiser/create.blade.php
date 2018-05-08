@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-xs-12 col-8 justify-content-center">
        <h1>New Fundraiser</h1>
        <form action="{{action('FundraiserController@store')}}" method="post">

            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required="required"
                @if(count($errors) > 0) value="{{old('name')}}" @endif />
            </div>
            <div class="form-group">
                <label for="location">Location (City, State)</label>
                <input type="text" class="form-control {{$errors->has('location') ? 'is-invalid' : ''}}" 
                    name="location" Location (City, State)required="required" @if(count($errors) > 0) value="{{old('location')}}" @endif />
                @if($errors->has('location'))
                    <div class="invalid-feedback">{{$errors->first('location')}}</div>
                @endif
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Add Fundraiser</button>
            </div>
        </form>
    </div>
</div>
@endsection