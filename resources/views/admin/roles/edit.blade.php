@extends('admin.layout.master')
@section('title', 'Edit Role')
@section('content')

    <div class="container">
        <form action="{{route('roles.update', ['role' => $role])}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('warehouse.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
            </div>
            @error('name')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
            <a href="{{route('roles.index')}}" class="fa-pull-left btn btn-primary"><i class="fas fa-caret-square-left"></i></a>
            <button type="submit" class="fa-pull-right btn btn-success"><i class="fas fa-cloud-upload-alt"></i></button>
        </form>
    </div>

@endsection
