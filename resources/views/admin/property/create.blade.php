@extends('admin.layout.master')
@section('content')
    <div class="container">
        <form action="{{route('property.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="mb-3">
                <label for="prop_type" class="form-label">Property type</label>
                <select name="property_type_id" class="form-control">
                    @foreach($prop_types as $type)
                        <option value="{{ $type->id }}">{{ $type->properties }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{__('user.save')}}</button>
        </form>
    </div>
@endsection
