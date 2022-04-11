@extends('admin.layout.master')
@section('client')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('categories.store')}}" method="post">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <x-a-l-input type="text" name="title_uz" id="title_uz" label="Title uz"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="title_en" id="title_en" label="Title en"></x-a-l-input>
                    </div>
                    <div class="mb-3">
                        <x-a-l-input type="text" name="title_ru" id="title_en" label="Title ru"></x-a-l-input>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
