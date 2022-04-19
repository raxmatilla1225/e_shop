@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('property.create')}}" class="btn btn-success">{{__('user.create')}}</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('user.name')}}</th>
                <th scope="col">{{__('user.type')}}</th>
                <th scope="col">{{__('user.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($property as $property)
                <tr>
                    <th scope="row">{{$property->id}}</th>
                    <th scope="row">{{$property->name}}</th>
                    <th scope="row">
                        {{ $property->property_type->properties }}
                    </th>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning ml-1" href="{{route('property.show', ['property' => $property])}}">{{__('user.show')}}</a>
                            <a class="btn btn-primary ml-1" href="{{route('property.edit', ['property' => $property])}}">{{__('user.update')}}</a>
                            <form action="{{route('property.destroy', ['property' => $property->id])}}" method="post">
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
{{--        {{$property->links()}}--}}
    </div>

@endsection
