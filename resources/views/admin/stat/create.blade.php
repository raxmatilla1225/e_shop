@extends('admin.layout.master')
@section('title','Create Status')
@section('content')
    <div class="container">
        <div class="container">
            <form action="{{route('status.store')}}" method="post">
                @method('POST')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{__('status.name')}}</label>
                    <input type="text" class="form-control" id="name" name="name" >
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
                <button type="submit" class="btn btn-primary">{{__('warehouse.save')}}</button>
            </form>
        </div>
    </div>

@endsection
