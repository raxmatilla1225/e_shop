@extends('admin.layout.master')
@section('content')

    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('propertytype.create')}}" class="btn btn-success">{{__('user.create')}}</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('user.name')}}</th>
                <th scope="col">{{__('user.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($propertytype as $propertytype)
                <tr>
                    <th scope="row">{{$propertytype->id}}</th>
                    <th scope="row">{{$propertytype->properties}}</th>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning ml-1" href="{{route('propertytype.show', ['propertytype' => $propertytype])}}">{{__('user.show')}}</a>
                            <a class="btn btn-primary ml-1" href="{{route('propertytype.edit', ['propertytype' => $propertytype])}}">{{__('user.update')}}</a>
                            <form action="{{route('propertytype.destroy', ['propertytype' => $propertytype->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger ml-1">{{__('user.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{$propertytype->links()}}--}}
    </div>

@endsection
