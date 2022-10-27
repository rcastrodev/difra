@extends('adminlte::page')
@section('title', 'Contenido videos')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Videos</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <h3>Sliders</h3>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Video</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.video.modals.create')
@includeIf('administrator.video.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('video.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <style>
        iframe{
            max-width: 300px;
            max-height: 200px;
        }
    </style>
@stop


@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/video/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

