@extends('admin.layout.master')
@section('title','Author-edit')
@section('content')
    <div class="container">

        <form action="{{route('authors.update', ['author' => $author])}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name">{{__('author.name')}}</label>
                <input type="text" value="{{$author->name}}" class="form-control" id="name" name="name"
                       placeholder="Author">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">{{__('author.submit')}}</button>
        </form>

    </div>
@endsection
