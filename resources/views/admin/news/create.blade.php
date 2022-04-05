@extends('admin.layout.master')
@section('title','News-create')
@section('content')
    <div class="container">

        <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="card-body row">
                <div class="form-group col-md-5">
                    <label for="title">{{__('new.title')}}</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="News title">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <br>

                    <label for="desc">{{__('new.description')}}</label>
                    <textarea id="desc" class="form-control" name="description" rows="3"
                              placeholder="Description ..."></textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-5">
                    <label for="meta_keys">{{__('new.meta_keys')}}</label>
                    <input type="text" class="form-control" id="meta_keys" name="meta_keys" placeholder="Meta keys">
                    @error('meta_keys')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <br>

                    <label for="meta_description">{{__('new.meta_description')}}</label>
                    <textarea id="meta_description" class="form-control" name="meta_description" rows="3"
                              placeholder="Meta description ..."></textarea>
                    @error('meta_description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-5">
                    <label for="news_c">{{__('new.category')}}</label>
                    <select id="news_c" name="category" class="form-control select2" style="width: 100%;">
                        <option value=" ">Select category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-5">
                    <label for="author">{{__('new.author')}}</label>
                    <select id="author" name="author" class="form-control select2" style="width: 100%;">
                        <option value=" ">Select author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="status">{{__('new.status')}}</label>
                    <input type="text" class="form-control" id="status" name="status">
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="view_count">{{__('new.view_count')}}</label>
                    <input type="number" min="0" id="view_count" class="form-control" name="view_count">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="exampleInputFile">{{__('new.image')}}</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        {{--            <div class="form-group with-border icheck-primary d-inline">--}}
        {{--                <label for="checkboxPrimary2">Status</label>--}}
        {{--                <input type="checkbox" id="checkboxPrimary2">--}}
        {{--            </div>--}}
        <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
@endsection
