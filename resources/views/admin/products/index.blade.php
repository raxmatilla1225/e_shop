@extends('admin.layout.master')
@section('title','Products')
@section('content')
    @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row mx-2">
            <div class="col-12">
                <div class="row float-right">
                    <div class="col-md-12 mb-3 mt-2 mr-5">
                        <a href="{{route('products.create')}}"
                           class="btn btn-success">{{__('actions.create', ['model' => __('product.product')])}} +</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
{{--                        <th scope="col">{{__('product.name_ru')}}</th>--}}
{{--                        <th scope="col">{{__('product.name_en')}}</th>--}}
                        <th scope="col">{{__('product.name_uz')}}</th>
{{--                        <th scope="col">{{__('product.short_desc_ru')}}</th>--}}
{{--                        <th scope="col">{{__('product.short_desc_en')}}</th>--}}
                        <th scope="col">{{__('product.short_desc_uz')}}</th>
{{--                        <th scope="col">{{__('product.desc_ru')}}</th>--}}
{{--                        <th scope="col">{{__('product.desc_en')}}</th>--}}
{{--                        <th scope="col">{{__('product.desc_uz')}}</th>--}}
                        <th scope="col">{{__('product.price')}}</th>
{{--                        <th scope="col">{{__('product.old_price')}}</th>--}}
{{--                        <th scope="col">{{__('product.discount')}}</th>--}}
{{--                        <th scope="col">{{__('product.status_id')}}</th>--}}
                        <th scope="col">{{__('product.category_id')}}</th>
{{--                        <th scope="col">{{__('product.order')}}</th>--}}
{{--                        <th scope="col">{{__('product.slug')}}</th>--}}
                        <th scope="col">{{__('product.main_img')}}</th>
{{--                        <th scope="col">{{__('product.images')}}</th>--}}
{{--                        <th scope="col">{{__('product.brand_id')}}</th>--}}
{{--                        <th scope="col">{{__('product.quantity')}}</th>--}}
{{--                        <th scope="col">{{__('product.delivery_days')}}</th>--}}
                        <th scope="col">{{__('product.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
{{--                            <td>{{$product->name_ru ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->name_en ?: 'NULL'}}</td>--}}
                            <td>{{$product->name_uz}}</td>
{{--                            <td>{{$product->short_desc_ru ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->short_desc_en ?: 'NULL'}}</td>--}}
                            <td>{{$product->short_desc_uz}}</td>
{{--                            <td>{{$product->desc_ru ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->desc_en ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->desc_uz}}</td>--}}
                            <td>{{$product->price}} $</td>
{{--                            <td>{{$product->old_price ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->discount ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->status_id ?: 'NULL'}}</td>--}}
                            <td>{{$product->category->title_uz ?: 'NULL'}}</td>
{{--                            <td>{{$product->order ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->slug ?: 'NULL'}}</td>--}}
                            <td><img alt="news_image" src="{{asset("uploads/admin/products/".$product->main_img) }}" width="65px">
                            </td>
{{--                            <td>{{$product->images ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->brand_id ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->quantity ?: 'NULL'}}</td>--}}
{{--                            <td>{{$product->delivery_days ?: 'NULL'}}</td>--}}
                            <td>
                                <div class="row">
                                    <a class="btn btn-warning"
                                       href="{{route('products.show', ['product'=> $product])}}">{{__('product.show')}}</a>
                                    <a class="btn btn-primary"
                                       href="{{route('products.edit', ['product'=> $product])}}">{{__('product.update')}}</a>
                                    <form action="{{route('products.destroy', ['product'=> $product])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">{{__('product.delete')}}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
