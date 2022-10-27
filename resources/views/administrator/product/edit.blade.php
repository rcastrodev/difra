@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Categoría</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div> 
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="AA">
        </div>
        <div class="form-group col-sm-12 col-md-2 d-flex flex-column justify-content-center align-items-center">
            <label>Es destacado</label>
            <input type="checkbox" name="outstanding" @if ($product->outstanding) checked @endif>
        </div>
        <div class="form-group col-sm-12">
            <label>Descripción</label>
            <textarea name="description" class="ckeditor" id="" cols="30" rows="10">{{$product->description}}</textarea>
        </div>

        @foreach ($product->images as $pi)
            <div class="form-group col-sm-12 col-md-4 ">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                    <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label>imagen <small>imagen 315x210 px</small></label>
                <input type="file" name="images[]" class="form-control-file">
            </div>                    
        @endforeach 
        @for ($i = 1; $i <= $numberOfImagesAllowed; $i++)
            <div class="form-group col-sm-12 col-md-4 ">
                <label for="image">imagen</label>
                <input type="file" name="images[]" class="form-control-file" id="">
            </div>           
        @endfor
        <div class="col-sm-12 mb-3 mt-3"><strong>Formatos PDF</strong></div>
        @if ($product->extra)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra']) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra']) }}">
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12 col-md-3 mb-4">
            <label>Ficha técnica</label>
            <input type="file" name="extra" class="form-control-file">
        </div> 
        @if ($product->extra2)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra2']) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Manual de pre-instalación</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra2']) }}">
                </button>
            </div>          
        @endif 
        <div class="form-group col-sm-12 col-md-3 mb-4">
            <label>Manual de pre-instalación</label>
            <input type="file" name="extra2" class="form-control-file">
        </div> 
        @if ($product->extra3)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra3']) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Manual de operación</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra3']) }}">
                </button>
            </div>          
        @endif 
        <div class="form-group col-sm-12 col-md-3 mb-4">
            <label>Manual de operación</label>
            <input type="file" name="extra3" class="form-control-file">
        </div> 
        @if ($product->extra4)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra4']) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Manual de mantenimiento</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra4']) }}">
                </button>
            </div>          
        @endif 
        <div class="form-group col-sm-12 col-md-3 mb-4">
            <label>Manual de mantenimiento</label>
            <input type="file" name="extra4" class="form-control-file">
        </div> 

        <div class="col-sm-12 mt-4">
            @if ($product->extra7)
                <div class="form-group col-sm-12">
                    <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra7']) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Driver</a>
                    <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id, 'campo' => 'extra7']) }}">
                    </button>
                </div>          
            @endif 
            <strong>Driver debe ir en un archivo .zip</strong>
        </div>
        <div class="form-group col-sm-12 col-md-3 mb-4">
            <input type="file" name="extra7" class="form-control-file">
        </div> 

        <div class="form-group col-sm-12 mb-4">
            <label>Video 1</label>
            <input type="text" name="extra5" value="{{ $product->extra5 }}" class="form-control">
        </div> 
        <div class="form-group col-sm-12 mb-4">
            <label>Video 2</label>
            <input type="text" name="extra6" value="{{ $product->extra6 }}" class="form-control">
        </div> 
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/product/product.js') }}"></script>
@stop

