@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">QUIENES SOMOS</li>
		</ol>
	</div>
</div>
@if ($section1s)
	@if (count($section1s))
		<div id="sliderHeroEmpresa" class="carousel slide" data-bs-interval	="3000" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner" >
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset($v->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					</div>			
				@endforeach
			</div>	
		</div>	
	@endif
@endif
@isset($section2)
	<section id="section_2" class="py-sm-3 py-md-5 mb-4">
		<div class="container py-sm-0 py-md-3">
			<div class="row">
				<div class="col-sm-12 col-md-6 mb-4">
					<div class="mb-4">
						<h4 class="font-size-32 text-blue fw-light">Misión</h4>
						<div class="">{!! $section2->content_1!!}</div>
					</div>
					<div class="">
						<h4 class="font-size-32 text-blue fw-light">Visión</h4>
						<div class="">{!! $section2->content_2!!}</div>
					</div>				
				</div>
				<div class="col-sm-12 col-md-6">
					<img src="{{ asset($section2->image) }}" class="w-100 img-fluid" style="object-fit: cover;">
				</div>		
			</div>
		</div>
	</section>
@endisset
@endsection
