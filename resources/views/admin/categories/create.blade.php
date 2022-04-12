@extends('admin.layout.master')
@section('client')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <x-a-l-input type="text" name="title_uz" id="title_uz" label="Title uz"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="title_en" id="title_en" label="Title en" ></x-a-l-input>
                    </div>
                    <div class="mb-3">
                            <x-a-l-input type="text" name="title_ru" id="title_ru" label="Title ru"></x-a-l-input>
                    </div>

                    <div class="mb-3">
                        <x-a-l-input type="text" name="description_uz" id="description_uz" label="Description uz"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="description_en" id="description_en" label="Description en" ></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="description_ru" id="description_ru" label="Description ru" ></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="icon" id="icon" label="Icon"></x-a-l-input>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <x-a-l-input type="text" name="parent_id" id="parent_id" label="Parent"></x-a-l-input>--}}
{{--                    </div>--}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Parent</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="parent_id">
                            <option value="0">Null</option>
                             @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Order , After which ...</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="order">
                            <option value="0">Null</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <x-a-l-input type="file" name="image" id="inputGroupFile01" class="custom-file-input"></x-a-l-input>
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
