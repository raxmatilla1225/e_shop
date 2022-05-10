@extends('admin.layout.master')
@section('title','Clients')
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
                        <a href="{{route('categories.create')}}" class="btn btn-success">{{__('actions.create', ['model' => __('category.category')])}} +</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title En</th>
                        <th scope="col">Title Ru</th>
                        <th scope="col">Title UZ</th>
                        <th scope="col">Description En</th>
                        <th scope="col">Description Ru</th>
                        <th scope="col">Description UZ</th>
                        <th scope="col">ICON</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Order</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                         @foreach($categories as $category)
                             <tr>
                                 <td>{{$loop->index +1}}</td>
                                 <td>{{$category->title_en ?: 'NULL'}}</td>
                                 <td>{{$category->title_ru ?: 'NULL'}}</td>
                                 <td>{{$category->title_uz}}</td>
                                 <td>{{$category->description_en}}</td>
                                 <td>{{$category->description_ru ?: 'NULL'}}</td>
                                 <td>{{$category->description_uz ?: 'NULL'}}</td>
                                 <td>{{$category->icon ?: 'NULL'}}</td>
                                 <td>{{$category->parent_id ?: 'NULL'}}</td>
                                 <td>{{$category->order ?: 'NULL'}}</td>
                                 <td>{{$category->image ?: 'NULL'}}</td>
                                 <td>{{$category->status}}</td>
                                 <td> <div class="row">
                                         <a class="btn btn-warning" href="{{route('categories.show', ['category'=> $category])}}">{{__('user.show')}}</a>
                                         <a class="btn btn-primary" href="{{route('categories.edit', ['category'=> $category])}}">{{__('user.update')}}</a>
                                         <form action="{{route('categories.destroy', ['category'=> $category])}}" method="post">
                                             @method('DELETE')
                                             @csrf
                                             <button class="btn btn-danger">{{__('user.delete')}}</button>
                                         </form>
                                     </div></td>
                             </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
