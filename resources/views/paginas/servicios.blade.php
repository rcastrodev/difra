@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">SERVICIO TÉCNICO</li>
		</ol>
	</div>
</div>
@isset($services)
    @if (count($services))
        <div class="py-sm-3 py-md-5">
            <div class="container">
                <div class="row">
                    @foreach ($services as $s)
                        <div class="col-sm-12 col-md-6">
                            <div class="position-relative mb-4 py-4 px-4" style="background-color: #189fac05; min-height:280px;">
                                <h2 class="text-blue text-uppercase font-size-20 mb-5" style="font-weight: 300; margin-left: 60px;">{{$s->content_1}}</h2> 
                                <div style="font-weight: 300">{!!$s->content_2!!}</div>

                                @if (Storage::disk('custom')->exists($s->image))
                                    <div class="position-absolute bg-green" style="max-width: 88px; max-height:88px; padding: 10px; top:0; left:0;">
                                        <img src="{{Storage::disk('custom')->url($s->image)}}" alt="">
                                    </div>
                                @endif
                                
                                <a href="{{ route('contacto') }}" class="text-decoration-none fw-bold font-size-18 position-absolute" style="color: #189FAC; bottom:20px;">Consultar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>      
    @endif
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
