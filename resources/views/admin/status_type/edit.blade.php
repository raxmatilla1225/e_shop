@extends('admin.layout.master')
@section('title', 'Edit Status Type')
@section('content')

    <div class="container">
        <form action="{{route('types.update', ['type' => $type])}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('warehouse.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$type->name}}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <a href="{{route('types.index')}}" class="fa-pull-left btn btn-primary">{{__('warehouse.back')}}</a>
            <button type="submit" class="fa-pull-right btn btn-success">{{__('warehouse.update')}}</button>
        </form>
    </div>

@endsection
