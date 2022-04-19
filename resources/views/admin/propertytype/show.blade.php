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
                            <h3 class="title">{{__('user.show')}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="mb-0">{{__('user.name')}} :</p>
                                        <b style="font-size: 20px; !important;">{{$propertytype->properties}}</b>
                                    </div>
                                </div>
                                <div>
                                    <h1>Related properties</h1>
                                    <table class="table">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                        </tr>
                                        @foreach($propertytype->child_properties as $prop)
                                            <tr>

                                                <td>
                                                    {{$prop->id}}
                                                </td>
                                                <td>
                                                    {{$prop->name}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
