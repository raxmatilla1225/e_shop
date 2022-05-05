@extends('admin.layout.master')
@section('title', 'Edit Status')
@section('content')

    <div class="container">
        <form action="{{route('status.update', ['status' => $status])}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('status.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$status->name}}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="mySelect">{{__('status.choose')}}</label>
                <select id="mySelect" class="form-control" name="statuses_type_id">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{route('status.index')}}" class="fa-pull-left btn btn-primary">{{__('warehouse.back')}}</a>
            <button type="submit" class="fa-pull-right btn btn-success">{{__('warehouse.update')}}</button>
        </form>
    </div>
@endsection
