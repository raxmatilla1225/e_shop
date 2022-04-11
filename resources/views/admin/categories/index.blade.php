@extends('admin.layout.master')
@section('title','Clients')
@section('client')
    <div class="container-fluid">
        <div class="row mx-2">
            <div class="col-12">
                <div class="row float-right">
                    <div class="col-md-12 mb-3 mt-2 mr-5">
                        <a href="{{route('categories.create')}}" class="btn btn-success">{{__('actions.create', ['model' => __('category.category')])}} +</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
