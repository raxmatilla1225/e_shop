@extends('admin.layout.master')
@section('content')

    <div class="col-md-10 ml-4 mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{__('user.editprofile')}}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('propertytype.update', ['propertytype'=>$propertytype])}}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__('user.name')}}</label>
                                <input type="text" class="form-control" placeholder="" name="properties" value="{{$propertytype->properties}}">
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-success" style="border-radius:30px; !important" type="submit">{{__('user.save')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
