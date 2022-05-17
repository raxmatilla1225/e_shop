@extends('admin.layout.master')
@section('title','Product-edit')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{route('products.update', ['product' => $product])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="card-body row">

                        <div class="col-md-4">
                            <x-a-l-input type="text" name="name_ru" id="name_ru" label="{{__('product.name_ru')}}" value="{{$product->name_ru}}"></x-a-l-input>
                        </div>
                        @error('name_ru')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-4">
                            <x-a-l-input type="text" name="name_en" id="name_en" label="{{__('product.name_en')}}" value="{{$product->name_en}}"></x-a-l-input>
                        </div>
                        @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-4">
                            <x-a-l-input type="text" name="name_uz" id="name_uz" label="{{__('product.name_uz')}}" value="{{$product->name_uz}}"></x-a-l-input>
                        </div>
                        @error('name_uz')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="card-body row">

                        <div class="col-md-4">
                            <x-a-l-input value="{{ $product->short_desc_ru }}" placeholder="Enter {{__('product.short_desc_ru')}}" type="text" name="short_desc_ru" id="short_desc_ru" label="{{__('product.short_desc_ru')}}"></x-a-l-input>
                        </div>
                        @error('short_desc_ru')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-4">
                            <x-a-l-input value="{{ $product->short_desc_en }}" placeholder="Enter {{__('product.short_desc_en')}}" type="text" name="short_desc_en" id="short_desc_en" label="{{__('product.short_desc_en')}}"></x-a-l-input>
                        </div>
                        @error('short_desc_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-4">
                            <x-a-l-input value="{{ $product->short_desc_uz }}" placeholder="Enter {{__('product.short_desc_uz')}}" type="text" name="short_desc_uz" id="short_desc_uz" label="{{__('product.short_desc_uz')}}"></x-a-l-input>
                        </div>
                        @error('short_desc_uz')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="card-body row">

                        <div class="col-md-4">
                            <label for="desc_ru">{{__('product.desc_ru')}}</label>
                            <textarea id="desc_ru" class="form-control" name="desc_ru" rows="5">{{ $product->desc_ru }}</textarea>
                        </div>
                        @error('desc_ru')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-4">
                            <label for="desc_en">{{__('product.desc_en')}}</label>
                            <textarea id="desc_en" class="form-control" name="desc_en" rows="5">{{$product->desc_en}}</textarea>
                        </div>
                        @error('desc_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-4">
                            <label for="desc_uz">{{__('product.desc_uz')}}</label>
                            <textarea id="desc_uz" class="form-control" name="desc_uz" rows="5">{{$product->desc_uz}}</textarea>
                        </div>
                        @error('desc_uz')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="card-body row">

                        <div class="col-md-4">
                            <x-a-l-input value="{{$product->price}}" placeholder="Enter {{__('product.price')}}" type="number" name="price" id="price" label="{{__('product.price')}}"></x-a-l-input>
                        </div>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-4">
                            <x-a-l-input value="{{$product->old_price}}" placeholder="Enter {{__('product.old_price')}}" type="number" name="old_price" id="old_price" label="{{__('product.old_price')}}"></x-a-l-input>
                        </div>
                        @error('old_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-4">
                            <x-a-l-input value="{{$product->discount}}" placeholder="Enter {{__('product.discount')}}" type="number" name="discount" id="discount" label="{{__('product.discount')}}"></x-a-l-input>
                        </div>
                        @error('discount')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="card-body row">

                        <div class="col-md-6">
                            <label for="brand_id">{{__('product.brand_id')}}</label>
                            <select id="brand_id" name="brand_id" class="form-control select2" style="width: 100%;">
                                <option value="{{$product->brand_id}}">Select brand</option>
                                <option value=" ">{{__('product.brand_id')}} 1</option>
                                <option value=" ">{{__('product.brand_id')}} 2</option>
                                <option value=" ">{{__('product.brand_id')}} 3</option>
                                <option value=" ">{{__('product.brand_id')}} 4</option>
                                {{--                                @foreach($authors as $author)--}}
                                {{--                                    <option value="{{ $author->id }}">{{ $author->name }}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>
                        @error('brand_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-6">
                            <label for="category">{{__('product.category_id')}}</label>
                            <select id="category" name="category_id" class="form-control select2" style="width: 100%;">
                                <option value="{{$product->category_id}}">Select category</option>
                                <option value=" ">{{__('product.category_id')}} 1</option>
                                <option value=" ">{{__('product.category_id')}} 2</option>
                                <option value=" ">{{__('product.category_id')}} 3</option>
                                <option value=" ">{{__('product.category_id')}} 4</option>
                                {{--                                @foreach($authors as $author)--}}
                                {{--                                    <option value="{{ $author->id }}">{{ $author->name }}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="card-body row">

                        <div class="col-md-6">
                            <x-a-l-input value="{{$product->order}}" placeholder="Enter {{__('product.order')}}" type="number" name="order" id="order" label="{{__('product.order')}}"></x-a-l-input>
                        </div>
                        @error('order')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-6">
                            <label for="status">{{__('product.status_id')}}</label>
                            <select id="status" name="status_id" class="form-control select2" style="width: 100%;">
                                <option value="{{$product->status_id}}">Select status</option>
                                <option value=" ">{{__('product.status_id')}} 1</option>
                                <option value=" ">{{__('product.status_id')}} 2</option>
                                <option value=" ">{{__('product.status_id')}} 3</option>
                                <option value=" ">{{__('product.status_id')}} 4</option>
                                {{--                                @foreach($authors as $author)--}}
                                {{--                                    <option value="{{ $author->id }}">{{ $author->name }}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>
                        @error('status_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="card-body row">

                        <div class="col-md-6">
                            <label for="exampleInputFile">{{__('product.main_img')}}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="main_img" class="custom-file-input" id="main_img">
                                    <label class="custom-file-label" for="main_img">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        @error('main_img')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-6">
                            <label for="exampleInputFile">{{__('product.images')}}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" multiple name="images[]" class="custom-file-input" id="images">
                                    <label class="custom-file-label" for="images">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        @error('images[]')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="card-body row">

                        <div class="col-md-6">
                            <x-a-l-input value="{{$product->quantity}}" placeholder="Enter {{__('product.quantity')}}" type="number" name="quantity" id="quantity" label="{{__('product.quantity')}}"></x-a-l-input>
                        </div>
                        @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-md-6">
                            <x-a-l-input value="{{$product->delivery_days}}" placeholder="Enter {{__('product.delivery_days')}} example:2020.05.05" type="text" name="delivery_days" id="delivery_days" label="{{__('product.delivery_days')}}"></x-a-l-input>
                        </div>
                        @error('delivery_days')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div>
        </div>

    </div>

@endsection
