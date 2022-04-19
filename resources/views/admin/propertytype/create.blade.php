@extends('admin.layout.master')
@section('content')
    <div class="container">
        <form action="{{route('propertytype.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Property</label>
                <input type="text" class="form-control" id="properties" name="properties">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">{{__('user.save')}}</button>
        </form>
    </div>
@endsection
