@extends('admin.layout.master')
@section('title', 'Product-show')
@section('content')
{{--<div class="row">--}}
{{--    <div class="col-md-4">--}}
{{--        @foreach ($product->images as $image)--}}
{{--            --}}{{--                    <img src="{{asset('../storage/app/'.$image)}}" alt="">--}}
{{--            <img src="storage/app/{{$image}}" width="20px" alt="">--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{__('product.name_ru')}}</th>
            <th scope="col">{{__('product.name_en')}}</th>
            <th scope="col">{{__('product.name_uz')}}</th>
            <th scope="col">{{__('product.short_desc_ru')}}</th>
            <th scope="col">{{__('product.short_desc_en')}}</th>
            <th scope="col">{{__('product.short_desc_uz')}}</th>
            <th scope="col">{{__('product.desc_ru')}}</th>
            <th scope="col">{{__('product.desc_en')}}</th>
            <th scope="col">{{__('product.desc_uz')}}</th>
            <th scope="col">{{__('product.price')}}</th>
            <th scope="col">{{__('product.old_price')}}</th>
            <th scope="col">{{__('product.discount')}}</th>
            <th scope="col">{{__('product.status_id')}}</th>
            <th scope="col">{{__('product.category_id')}}</th>
            <th scope="col">{{__('product.order')}}</th>
            <th scope="col">{{__('product.slug')}}</th>
            <th scope="col">{{__('product.main_img')}}</th>
            <th scope="col">{{__('product.images')}}</th>
            <th scope="col">{{__('product.brand_id')}}</th>
            <th scope="col">{{__('product.quantity')}}</th>
            <th scope="col">{{__('product.delivery_days')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$product->id}}</th>
            <th scope="row">{{$product->name_ru}}</th>
            <th scope="row">{{$product->name_en}}</th>
            <th scope="row">{{$product->name_uz}}</th>
            <th scope="row">{{$product->short_desc_ru}}</th>
            <th scope="row">{{$product->short_desc_en}}</th>
            <th scope="row">{{$product->short_desc_uz}}</th>
            <th scope="row">{{$product->desc_ru}}</th>
            <th scope="row">{{$product->desc_en}}</th>
            <th scope="row">{{$product->desc_uz}}</th>
            <th scope="row">{{$product->price}}</th>
            <th scope="row">{{$product->old_price}}</th>
            <th scope="row">{{$product->discount}}</th>
            <th scope="row">{{$product->status_id}}</th>
            <th scope="row">{{$product->category_id}}</th>
            <th scope="row">{{$product->order}}</th>
            <th scope="row">{{$product->slug}}</th>
            <th scope="row">
                <img src="{{asset("uploads/admin/products/".$product->main_img)}}" width="120px" alt="">
            </th>
            <th scope="row">
                @foreach ($product->images as $image)
{{--                    <img src="{{asset('../storage/app/'.$image)}}" alt="">--}}
                <img src="{{asset('storage/'.$image)}}" width="20px" alt="">
{{--                <img src="{{Storage::url("app/".$image)}}" width="20px" alt="">--}}
            @endforeach
            </th>
            <th scope="row">{{$product->brand_id}}</th>
            <th scope="row">{{$product->quantity}}</th>
            <th scope="row">{{$product->delivery_days}}</th>
            <td>
                <a href="{{ route('products.index')}}" class="btn btn-primary">{{__('product.go-back')}}</a>
            </td>
        </tr>

        </tbody>
    </table>
@endsection()
