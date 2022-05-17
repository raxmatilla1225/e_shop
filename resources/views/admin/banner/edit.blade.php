@extends('admin.layout.master')
@section('content')
    <div class="col-md-10 mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Edit</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('banner.update', ['banner'=>$banner])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="" name="title" value="{{$banner->title}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" placeholder="" name="description" value="{{$banner->description}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <label>Price</label>
                                <input type="text" class="form-control" placeholder="" name="price" value="{{$banner->price}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <div class="form-group">
                                <img class="" src="{{asset('banner/'.$banner->image)}}" width="50px" height="50px" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @if($banner->status == '1') selected @endif>Active</option>
                                    <option value="0" @if($banner->status == '0') selected @endif>Disabled</option>
                                </select>
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

