@extends('admin.layout.master')
@section('content')
    <div class="main-panel" id="main-panel">

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="title">Show</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="mb-0">Name :</p>
                                    <b style="font-size: 20px; !important;">{{$a->name}}</b>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="mb-0">Username :</p>
                                    <b style="font-size: 20px; !important;">{{$a->username}}</b>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="mb-0">Phone number :</p>
                                    <b style="font-size: 20px; !important;">{{$a->phone_number}}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
