@extends('admin.layout.master')
@section('content')

<div class="col-md-10 ml-4 mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="title">{{__('brands.edit')}}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('brands.update', ['brands'=>$brands])}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('brands.name')}}</label>
                            <input type="text" name="name" value="{{$brands->name}}" class="form-control" id="exampleInputName" placeholder="Enter Name">
                        </div>
                    </div>
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('brands.email')}}</label>
                            <input type="email" name="email" value="{{$market->email}}" class="form-control" id="exampleInputEmail" placeholder="Email">
                        </div>
                    </div>
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('brands.phone')}}</label>
                            <input type="text" name="phone" value="{{$market->phone}}" class="form-control" id="exampleInputPhone" placeholder="Phone">
                        </div>
                    </div>
                </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label col-lg-2">Image</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control h-auto" name="img">
                            </div>
                    </div>
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-success" style="border-radius:25px; !important" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
