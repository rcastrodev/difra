@extends('adminlte::page')
@section('title', 'Producto')
@section('content_header')
@stop
@section('content')
<div class="">
    <form action="{{ route('product.update-info') }}" method="post" data-asyn="no" class="mb-5">
        @csrf
        <input type="hidden" name="id" value="{{$content->id}}">
        <div class="form-group">
            <input type="text" name="content_1" class="form-control" value="{{$content->content_1}}" placeholder="Título">
        </div>
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
                <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$content->content_2}}</textarea>
            </div>
            <div class="col-sm-12 col-md-6">
                <textarea name="content_3" class="ckeditor" cols="30" rows="10">{{$content->content_3}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="content_4" class="form-control" value="{{$content->content_4}}" placeholder="Texto en descargas">
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex align-items-center">
            <h1 class="mr-3">Productos</h1>
            <a href="{{ route('product.content.create') }}" class="btn btn-sm btn-primary">crear</a>
        </div>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.product.modals.create')
@includeIf('administrator.product.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('product.content.find')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')

    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/product/index.js') }}"></script>
@stop

