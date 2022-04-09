@extends('admin.layout.master')
@section('title','News-edit')
@section('content')
    <div class="container">

        <form action="{{route('newsCategory.update', ['newsCategory' => $newsCategory])}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name">{{__('new_category.name')}}</label>
                <input type="text" value="{{$newsCategory->name}}" class="form-control" id="name" name="name"
                       placeholder="News category">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">{{__('new.submit')}}</button>
        </form>

    </div>
@endsection
