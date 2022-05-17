@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('banner.create')}}" class="btn btn-success">{{__('user.create')}}</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('user.title')}}</th>
                <th scope="col">{{__('user.description')}}</th>
                <th scope="col">{{__('user.price')}}</th>
                <th scope="col">{{__('user.image')}}</th>
                <th scope="col">{{__('user.status')}}</th>
                <th scope="col">{{__('user.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($banner as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <th scope="row">{{$item->title}}</th>
                    <th scope="row">{{$item->description}}</th>
                    <th scope="row">{{$item->price}}</th>
                    <th scope="row">
                        <img class="" src="{{asset('public/banner'.$item->image)}}" width="30px" height="30px" alt="...">
                    </th>
                    <th scope="row">
                        @if($item->status == true)
                            <h6>ACTIVE</h6>
                        @else
                            <h6>DISABLED</h6>
                        @endif
                    </th>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning ml-1" href="{{route('banner.show', ['banner' => $item])}}">{{__('user.show')}}</a>
                            <a class="btn btn-primary ml-1" href="{{route('banner.edit', ['banner' => $item])}}">{{__('user.update')}}</a>
                            <form action="{{route('banner.destroy', ['banner' => $item])}}" method="post">
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
{{--        {{$clients->links('pagination.bootstrap-5')}}--}}
    </div>

@endsection
