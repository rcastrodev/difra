@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">SOLICITAR PRESUPUESTO</li>
		</ol>
	</div>
</div>
<div class="my-3">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <span class="d-block">{{$error}}</span>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
        @endif
        @if (Session::has('mensaje'))
            <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
        @endif
        <form action="{{ route('send-quote') }}" method="post" id="cotizadorOnline" enctype="multipart/form-data" class="py-sm-2 py-md-5" style="color: #666666;">
            @csrf
            <div id="section1">
                <div class="w-75 mx-auto">
                    <img src="{{ asset('images/s1.png') }}" alt="" class="mx-auto img-fluid mb-3 d-sm-none d-md-block" style="max-height: 200px; object-fit: contain; max-width: 450px;">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control valid" placeholder="Nombre *">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control valid" placeholder="Correo electrónico *">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control valid" placeholder="Teléfono *">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="compania" value="{{ old('compania') }}" class="form-control" placeholder="Empresa">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end py-3">
                        <button type="button" id="btnS1" class="btn text-uppercase fw-bold font-size-14 text-white px-5 py-2" style="color: #189FAC !important; border: 1px solid #189FAC; border-radius: 0 !important;">Siguiente</button>
                    </div>
                </div>
            </div>
            <div id="section2" class="d-none">
                <div class="w-75 mx-auto">
                    <img src="{{ asset('images/s2.png') }}" alt="" class="d-block mx-auto img-fluid d-sm-none d-md-block" style="max-height: 200px;  object-fit: contain; max-width: 450px;">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="" class="d-block mb-2">Escoger modelo</label>
                                <select name="model" class="form-control">
                                    <option value="D3030 (300x300x150mm)">D3030 (300x300x150mm)</option>
                                    <option value="D6060 (600x600x150mm)">D6060 (600x600x150mm)</option>
                                    <option value="D9060 (900x600x200/300mm)">D9060 (900x600x200/300mm)</option>
                                    <option value="D1212 (1200x1200x200/300mm)">D1212 (1200x1200x200/300mm)</option>
                                    <option value="D9013 (900x1300x200/300mm)">D9013 (900x1300x200/300mm)</option>
                                    <option value="D1318 (1300x1800x200/300mm)">D1318 (1300x1800x200/300mm)</option>
                                    <option value="D1325 (1300x2500x200/300mm)">D1325 (1300x2500x200/300mm)</option>
                                    <option value="D2030 (2000x3000x200/300mm)">D2030 (2000x3000x200/300mm)</option>
                                    <option value="MODELO ESPECIAL">MODELO ESPECIAL</option>
                                    <option value="Preguntar">Preguntar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="" class="d-block mb-2">ÁREA UTIL ESPECIAL (EN MILIMETROS)</label>
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="ejex" placeholder="Eje X" value="{{ old('ejex') }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="ejey" value="{{ old('ejey') }}" placeholder="Eje Y" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="ejez" value="{{ old('ejez') }}" placeholder="Eje Z" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="" class="d-block mb-2">ALIMENTACION</label>
                            <div class="col-sm-12 col-md-4 d-flex justify-content-between ">
                                <div class="form-group mt-2 d-flex flex-column justify-content-center align-items-center"  style="min-width: 110px">
                                    <label for="">Monofásico (220V)</label>
                                    <input type="radio" name="power_supply" value="Monofásico (220V)">
                                </div>
                                <div class="form-group mt-2 d-flex flex-column justify-content-center align-items-center" style="min-width: 110px">
                                    <label for="">Trifásico (380V)</label>
                                    <input type="radio" name="power_supply" value="Trifásico (380V)">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="" class="d-block mb-2">MATERIALES A TRABAJAR</label>
                                <input type="text" name="materials_to_work" value="{{ old('materials_to') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="" class="d-block mb-2">ESPESOR DE MATERIALES (MINIMO Y MAXIMO)</label>
                            <div class="col-sm-12 col-md-4 d-flex justify-content-between ">
                                <div class="form-group me-3"  style="min-width: 110px">
                                    <input type="number" name="min" class="form-control" placeholder="Minimo">
                                </div>
                                <div class="form-group" style="min-width: 110px">
                                    <input type="number" name="max" class="form-control" placeholder="Maximo">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <textarea name="message" class="form-control" cols="30" rows="10" placeholder="mensaje ...">{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 mb-sm-3 mb-md-5 position-relative">
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-folder"></i></div>
                                </div>
                            </div>
                            <input type="file" name="file" class="form-control-file position-absolute" 
                            style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-3 col-sm-12">
                        <button type="button" id="btnS2" data-mover="seccion2" class="btn text-uppercase fw-bold font-size-14 px-5 py-2" style="color: #189FAC !important; border: 1px solid #189FAC; border-radius: 0 !important;">Anterior</button>
                        <button type="submit" class="btn text-uppercase text-white fw-bold px-5 font-size-14 bg-green py-2" style="border-radius: 0 !important;">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('head')
    <style>
        @media (max-width: 992px){
            .container .w-75{
                width: 100% !important;
            }
        }   
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@endpush