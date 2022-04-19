@extends('admin.layout.master')
@section('title','News')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('news.create')}}" class="btn btn-success">{{__('new.create')}}</a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('new.title')}}</th>
                <th scope="col">{{ __('new.description') }}</th>
                <th scope="col">{{ __('new.category') }}</th>
                <th scope="col">{{ __('new.image') }}</th>
                <th scope="col">{{ __('new.author') }}</th>
                <th scope="col">{{ __('new.status') }}</th>
                <th scope="col">{{ __('new.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news_s as $news)
                <tr>
                    <th scope="row">{{$news->id}}</th>
                    <td>{{$news->title}}</td>
                    <td>{{$news->description}}</td>
                    <td>{{$news->news_category_id}}</td>
                    <td><img alt="news_image" src="{{asset("uploads/admin/news/".$news->image_url) }}" width="65px">
                    </td>
                    <td>{{$news->author_id}}</td>
                    <td>{{$news->status}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning"
                               href="{{route('news.show', ['news'=> $news])}}">{{__('new.show')}}</a>
                            <a class="btn btn-primary"
                               href="{{route('news.edit', ['news'=> $news])}}">{{__('new.update')}}</a>
                            <form action="{{route('news.destroy', ['news'=> $news])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">{{__('new.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
