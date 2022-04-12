@extends('admin.layout.master')
@section('client')

<div class="col-md-10 ml-4 mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="title">{{__('user.editprofile')}}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('client.update', ['client'=>$client])}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('user.name')}}</label>
                            <input type="text" class="form-control" placeholder="" name="name" value="{{$client->name}}">
                        </div>
                    </div>
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('user.username')}}</label>
                            <input type="text" class="form-control" placeholder="" name="username" value="{{$client->username}}">
                        </div>
                    </div>
                </div>
                @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('user.phonenumber')}}</label>
                            <input type="text" class="form-control" placeholder="" name="phone_number" value="{{$client->phone_number}}">
                        </div>
                    </div>
                </div>
                @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-success" style="border-radius:30px; !important" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
