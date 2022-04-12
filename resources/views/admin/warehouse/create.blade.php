@extends('admin.layout.master')
@section('title', 'Create Warehouse')
@section('content')
    <div class="container">
        <form action="{{route('warehouse.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('warehouse.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">{{__('warehouse.save')}}</button>
        </form>
    </div>
@endsection
