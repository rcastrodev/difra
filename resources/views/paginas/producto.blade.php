@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('productos') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">PRODUCTOS</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">{{ $product->name }}</li>
		</ol>
	</div>
</div>
<section class="py-sm-2 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="d-flex flex-column-reverse">
                    <div class="d-sm-none d-md-block">
                        <ul class="d-flex p-0 multiple-items" style="list-style: none; overflow: hidden;">
                            @foreach ($product->images as $pi)
                                <li class="me-2" style="border:1px solid #BECAD6">
                                    <img src="{{ asset($pi->image) }}" width="85" height="65" class="imagenes"  style="object-fit: cover; cursor:pointer;">
                                </li>                 
                            @endforeach
                        </ul>
                    </div> 
                    @if (count($product->images))
                        <div class="">
                            <img src="{{ asset($product->images()->first()->image) }}" class="mx-auto img-fluid d-block w-100 mb-3" alt="{{$product->name}}" width="375" height="375" style="object-fit: contain; max-height:460px;" id="imagen-actual">
                        </div>
                    @else 
                        <div class="">
                            <img src="{{ asset('images/default.jpg') }}" class="mx-auto img-fluid d-block w-100" style="object-fit: contain;"> 
                        </div>                                   
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="col-sm-12 d-sm-block text-blue font-size-25 mb-4 text-uppercase" style="font-weight: 300;">{{$product->name}}</div>
                <div class="font-size-14 ul-style">{!! $product->description !!}</div>
                <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap mt-5">
                    @if($product->extra)
                        <a href="{{ route('ficha-tecnica', ['id' => $product->id, 'campo' => 'extra']) }}" class="btn text-red fw-bold py-2 px-4 text-uppercase btn-outline-danger font-size-13 me-3 mb-sm-3 mb-md-0" style="color: #189FAC; border: 1px solid;border-color: #189FAC !important; border-radius:0px;"><i class="fas fa-download text-red"></i> DESCARGAR FICHA</a>
                    @endif
                    <a href="{{ route('cotizacion') }}" class="btn bg-green text-white fw-bold py-2 px-5 text-uppercase font-size-13 mb-sm-3 mb-md-0" style="border-radius:0px;">consultar</a>
                </div>
            </div>
        </div>
    </div>
</section>
@if ($relatedProducts->count())
    <section class="pb-5 relatedProducts">
        <div class="container">
            <div class="position-relative">
                <h2 class="mb-5 text-uppercase font-size-21 text-blue col-sm-12 pb-2 fw-light">PRODUCTOS RELACIONADOS</h2>
            </div>
            <div class="producto row font-size-14 my-3">
                @foreach ($relatedProducts as $k => $p)
                    <div class="col-sm-12 col-md-3 mb-3">
                        @includeIf('paginas.partials.producto', ['product' => $p])
                    </div>
                    @if ($k == 3) @php break; @endphp @endif
                @endforeach                
            </div>    
        </div>
    </section>
@endif
@if ($product->extra5 || $product->extra6)
    <section class="py-sm-2 py-md-5">
        <div class="container">
            <h2 class="mb-3 text-uppercase font-size-21 text-blue fw-light">Videos</h2>
            <div class="row">
                <div class="col-sm-12 col-md-6">{!! $product->extra5 !!}</div>
                <div class="col-sm-12 col-md-6">{!! $product->extra6 !!}</div>
            </div>
        </div>
    </section> 
@endif
@endsection
@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
    <style>
        .slick-list.draggable{
            min-width: 100%;
        }
        .slick-track{
            margin-left: 0;
        }
        .slick-slide img{
            width: 100%;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('vendor/slick/slick.js') }}"></script>
    <script>
        $('.imagenes').click(function (e){
            e.preventDefault()
            $('#imagen-actual').attr('src', e.target.src)
        })
        $('.multiple-items').slick({
            infinite: false,
            slidesToShow: 6,
            slidesToScroll: 3
        });
    </script>
@endpush



