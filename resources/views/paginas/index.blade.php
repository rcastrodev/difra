@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
					
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif">
						<img src="{{ asset($v->image) }}" class="d-block w-100">
						<div class="carousel-caption d-none d-md-block text-start">
							<h2 class="font-size-41 text-white">{{ $v->content_1 }}</h2>
							<h3 class="text-white font-size-30" style="font-weight: 100 !important;">{{ $v->content_2 }}</h3>
						</div>
					</div>
					
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@isset($products)
	@if (count($products))
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
			<div class="position-relative">
				<h2 class="mb-5 text-uppercase font-size-32 text-blue col-sm-12 pb-2 text-center fw-light">EQUIPOS</h2>
			</div>
			@foreach ($products as $p)
				<div class="col-sm-12 col-md-3 mb-md-5 mb-sm-3">
					@includeIf('paginas.partials.producto', ['p' => $p])
				</div>
			@endforeach
		</div>
	</section>
	@endif
@endisset
@isset($section2)
<section id="section2">
	<div class="row">
		<div class="col-sm-12 col-md-6 pe-0 d-sm-none d-md-block">
			<img src="{{Storage::disk('custom')->url($section2->image)}}" class="img-fluid w-100">
		</div>
		<div class="col-sm-12 col-md-6 d-flex flex-column justify-content-center ps-sm-2 ps-md-0 py-sm-3 py-md-5" style="background-color:#189fac05;">
			<h4 class="mb-3 text-blue font-size-21 fw-bold ps-sm-2 ps-md-5">{{ $section2->content_1 }}</h4>
			<div class="font-size-23 ps-sm-2 ps-md-5 mb-sm-2 mb-md-5" style="max-width: 600px;">
				<div style="color: #333333; font-weight:300;">{!! $section2->content_2 !!}</div>
				<div class="">
					<a href="{{ route('contacto') }}" class="text-uppercase bg-green py-2 px-5 fw-bold text-decoration-none text-white font-size-14">m&aacute;s informaci&oacute;n</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endisset
@isset($clients)
	@if (count($clients))
		<div id="clients" class="py-5">
			<h2 class="mb-5 text-uppercase font-size-32 text-blue col-sm-12 pb-2 text-center fw-light">NUESTROS CLIENTES</h2>
			<div class="carrusel">
				@foreach ($clients as $client)
					@if (Storage::disk('custom')->exists($client->image))
						<div class="content-img-carrusel"><img src="{{ asset($client->image) }}" ></div>
					@endif
				@endforeach
			</div>
		</div>
	@endif
@endisset
@isset($section3)
	<section id="section3" class="bg-light py-sm-3 py-md-5 d-sm-none d-md-block">
		<div class="container mx-auto">
			<div class="row">
				<div class="col-md-2"><h2 class="text-blue font-size-30" style="font-weight: 300;">{{ $section3->content_1 }}</h2></div>
				@isset($instagramImages)
					@if (count($instagramImages))
						<div class="col-md-3">
							<div class="d-flex flex-wrap mb-4">
								@foreach ($instagramImages as $ii)
									<img src="{{ asset($ii) }}" class="img-fluid mx-2 my-1" width="80" height="80" style="max-height: 80px; max-width: 80px; min-height: 80px; min-width: 80px;">
								@endforeach	
							</div>
							<div class="text-center">
								<a href="https://www.instagram.com/difracnc/" class="btn btn-sm btn-primary" target="_blank">Seguirnos en IG</a>
							</div>
						</div>
					@endif
				@endisset	
				<div class="col-md-4">
					<div class="efbl-like-box 1">
							<div class="fb-page fb_iframe_widget" data-animclass="fadeIn" data-href="https://www.facebook.com/DifracncArgentina" data-hide-cover="false" data-width="250" data-height="" data-show-facepile="false" data-show-posts="true" data-adapt-container-width="false" data-hide-cta="false" data-small-header="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=false&amp;app_id=395202813876688&amp;container_width=267&amp;hide_cover=false&amp;hide_cta=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FDifracncArgentina&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=false&amp;show_posts=true&amp;small_header=false&amp;width=250"><span style="vertical-align: bottom; width: 250px; height: 500px;"><iframe name="f31d2c39f4cec94" width="250px" height="1000px" data-testid="fb:page Facebook Social Plugin" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/plugins/page.php?adapt_container_width=false&amp;app_id=395202813876688&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1fe4d39cdb1814%26domain%3Ddifracnc.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fdifracnc.com%252Ff4e597ee0f169%26relation%3Dparent.parent&amp;container_width=267&amp;hide_cover=false&amp;hide_cta=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FDifracncArgentina&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=false&amp;show_posts=true&amp;small_header=false&amp;width=250" style="border: none; visibility: visible; width: 250px; height: 500px;" class=""></iframe></span></div> 
						</div>
				</div>				
			</div>
		</div>
	</section>
@endisset
@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
@endpush
@push('scripts')
	<script src="{{ asset('vendor/slick/slick.js') }}"></script>
	<script>
		$('.carrusel').slick({
			dots: true,
			infinite: false,
			speed: 300,
			slidesToShow: 5,
			slidesToScroll: 3,
			responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 2
				}
				},
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
				}
			]
		});
	</script>
@endpush