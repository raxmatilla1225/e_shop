@extends('admin.layout.master')
@section('content')

<div class="col-md-10 ml-4 mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="title">{{__('market.edit')}}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('market.update', ['market'=>$market])}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('market.name')}}</label>
                            <input type="text" name="name" value="{{$market->name}}" class="form-control" id="exampleInputName" placeholder="Enter Name">
                        </div>
                    </div>
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('market.email')}}</label>
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
                            <label>{{__('market.password')}}</label>
                            <input type="password" name="password" value="{{$market->password}}" class="form-control" id="exampleInputPassword" placeholder="Password">
                        </div>
                    </div>
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('market.phone')}}</label>
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
                            <label>{{__('market.address')}}</label>
                            <input type="text" name="address" value="{{$market->address}}" class="form-control" id="exampleInputAddress" placeholder="Address">
                        </div>
                    </div>
                </div>
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('market.working_hours')}}</label>
                            <input type="text" name="working_hours" value="{{$market->working_hours}}" class="form-control" id="exampleInputWorking Hours" placeholder="Working Hours">
                        </div>
                    </div>
                </div>
                @error('working_hours')
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
