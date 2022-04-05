@extends('admin.layout.master')
@section('title','Provinces-updatete')
@section('content')
    <div class="container">
        <form action="{{route('provinces.update', ['province' => $province])}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('province.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$province->name}}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="province_id" class="form-label">{{__('province.pId')}}</label>
                <input type="text" class="form-control" id="province_id" name="province_id"  value="{{$province->province_id}}">
            </div>
            @error('province_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">{{__('province.save')}}</button>
        </form>
    </div>
@endsection
