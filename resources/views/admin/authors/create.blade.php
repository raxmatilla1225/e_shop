@extends('admin.layout.master')
@section('title','Author-create')
@section('content')
    <div class="container">

        <form action="{{route('authors.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="title">{{__('author.name')}}</label>
                <input type="text" class="form-control" id="title" name="name" placeholder="Author">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
