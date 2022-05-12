@extends('admin.layout.master')
@section('content')
    <div class="container">
        <form action="{{route('brands.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail" placeholder="Email" aria-describedby="Email">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPhone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputPhone" placeholder="Phone">
            </div>
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @enderror
            <div class="mb-3">
                <label class="col-form-label col-lg-2">Image</label>
                <div class="col-lg-10">
                    <input type="file" class="form-control h-auto" name="img">
                </div>
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            <button type="submit" class="btn btn-primary">{{__('brands.save')}}</button>
        </form>
    </div>
@endsection
