@extends('admin.layout.master')
@section('title','Market')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('market.create')}}" class="btn btn-success">{{__('market.create')}}</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr role="row">
                <th scope="col">Id</th>
                <th scope="col">{{__('market.name')}}</th>
                <th scope="col">{{__('market.email')}}</th>
                <th scope="col">{{__('market.phone')}}</th>
                <th scope="col">{{__('market.address')}}</th>
                <th scope="col">{{__('market.working_hours')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($market as $info)
                <tr role="row" class="odd">
                    <th scope="row">{{$market->id}}</th>
                    <th scope="row">{{$market->name}}</th>
                    <th scope="row">{{$market->email}}</th>
                    <th scope="row">{{$market->phone}}</th>
                    <th scope="row">{{$market->address}}</th>
                    <th scope="row">{{$market->working_hours}}</th>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning ml-1" href="{{route('market.show', ['market' => $market])}}">{{__('market.show')}}</a>
                            <a class="btn btn-primary ml-1" href="{{route('market.edit', ['market' => $market])}}">{{__('market.update')}}</a>
                            <form action="{{route('market.destroy', ['market' => $market->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger ml-1">{{__('market.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            </tfoot>
        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
    </div>

@endsection
