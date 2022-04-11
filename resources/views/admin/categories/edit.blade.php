@extends('admin.layout.master')
@section('client')

<div class="col-md-10 ml-4 mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Edit Profile</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('client.update', ['client'=>$client])}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="" name="name" value="{{$client->name}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>LastName</label>
                            <input type="text" class="form-control" placeholder="" name="username" value="{{$client->username}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="" name="phone_number" value="{{$client->phone_number}}">
                        </div>
                    </div>
                </div>
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
