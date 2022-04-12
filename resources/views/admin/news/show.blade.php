@extends('admin.layout.master')
@section('title', 'News-show')
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{__('new.title')}}</th>
            <th scope="col">{{ __('new.description') }}</th>
            <th scope="col">{{ __('new.category') }}</th>
            <th scope="col">{{ __('new.image') }}</th>
            <th scope="col">{{ __('new.author') }}</th>
            <th scope="col">{{ __('new.view_count') }}</th>
            <th scope="col">{{ __('new.status') }}</th>
            <th scope="col">{{ __('new.meta_keys') }}</th>
            <th scope="col">{{ __('new.meta_description') }}</th>
{{--            <th scope="col">{{ __('new.actions') }}</th>--}}
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$news->id}}</th>
            <td>{{$news->title}}</td>
            <td>{{$news->description}}</td>
            <td>{{$news->news_category_id}}</td>
            <td>{{$news->image_url}}</td>
            <td>{{$news->author_id}}</td>
            <td>{{$news->view_count}}</td>
            <td>{{$news->status}}</td>
            <td>{{$news->meta_keys}}</td>
            <td>{{$news->meta_description}}</td>
            <td>
                <a href="{{ route('news.index')}}" class="btn btn-primary">{{__('new.go-back')}}</a>
            </td>
        </tr>

        </tbody>
    </table>
@endsection()
