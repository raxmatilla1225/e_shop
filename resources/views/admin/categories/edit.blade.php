@extends('admin.layout.master')
@section('codescription')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('categories.update' ,['category' => $category])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <x-a-l-input type="text" name="title_uz" id="title_uz" label="Title uz" value="{{$category->title_uz}}"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="title_en" id="title_en" label="Title en" value="{{$category->title_en}}"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="title_ru" id="title_ru" label="Title ru" value="{{$category->title_ru}}"></x-a-l-input>
                    </div>

                    <div class="mb-3">
                        <x-a-l-input type="text" name="description_uz" id="description_uz" label="Description uz" value="{{$category->description_uz}}"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="description_en" id="description_en" label="Description en" value="{{$category->description_en}}"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="description_ru" id="description_ru" label="Description ru" value="{{$category->description_ru}}"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="icon" id="icon" label="Icon" value="{{$category->icon}}"></x-a-l-input>
                    </div>
                    {{--                    <div class="mb-3">--}}
                    {{--                        <x-a-l-input type="text" name="parent_id" id="parent_id" label="Parent"></x-a-l-input>--}}
                    {{--                    </div>--}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Parent</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="parent_id">
                            <option value="">None</option>
                            @foreach($categories as $category1)
                                <option value="{{$category1->id}}">{{$category1->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Order , After which ...</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="order">
                            <option value="">None</option>
                            @foreach($categories as $category1)
                                <option value="{{$category1->id}}">{{$category1->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <x-a-l-input type="file" name="image" id="inputGroupFile01" class="custom-file-input" value="{{$category->image}}"></x-a-l-input>
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Status</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="status">
                            <option value="1">TRUE</option>
                            <option value="0">FALSE</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
