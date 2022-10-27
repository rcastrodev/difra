@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            @csrf
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Categoría</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="AA">
            </div>
            <div class="form-group col-sm-12 col-md-2 d-flex flex-column justify-content-center align-items-center">
                <label>Es destacado</label>
                <input type="checkbox" name="outstanding">
            </div>
            <div class="form-group col-sm-12">
                <label for="">Descripción</label>
                <textarea name="description" class="ckeditor" id="" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
            @for ($i = 1; $i <= 10; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image{{$i}}">imagen {{$i}}</label>
                    <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
                </div>           
            @endfor 
            <div class="col-sm-12 mb-3 mt-3"><strong>Formatos PDF</strong></div>
            <div class="form-group col-sm-12 col-md-3 mb-4">
                <label>Ficha técnica</label>
                <input type="file" name="extra" class="form-control-file">
            </div> 
            <div class="form-group col-sm-12 col-md-3 mb-4">
                <label>Manual de pre-instalación</label>
                <input type="file" name="extra2" class="form-control-file">
            </div> 
            <div class="form-group col-sm-12 col-md-3 mb-4">
                <label>Manual de operación</label>
                <input type="file" name="extra3" class="form-control-file">
            </div> 
            <div class="form-group col-sm-12 col-md-3 mb-4">
                <label>Manual de mantenimiento</label>
                <input type="file" name="extra4" class="form-control-file">
            </div>
            <div class="col-sm-12 mt-4"><strong>Driver debe ir en un archivo .zip</strong></div>
            <div class="form-group col-sm-12 mb-4">
                <label>Driver</label>
                <input type="file" name="extra7" class="form-control-file">
            </div>

            <div class="form-group col-sm-12 col-md-3 mb-4">
                <label>Video 1</label>
                <input type="text" name="extra5" class="form-control-file">
            </div> 
            <div class="form-group col-sm-12 col-md-3 mb-4">
                <label>Video 2</label>
                <input type="text" name="extra6" class="form-control-file">
            </div> 
        </div>
      <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

    