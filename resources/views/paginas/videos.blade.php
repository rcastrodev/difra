@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">VIDEOS</li>
		</ol>
	</div>
</div>
@isset($videos)
    @if ($videos->count())
        <section class="producto row font-size-14 my-3 container mx-auto videos my-sm-3 py-md-5">
            @foreach ($videos as $v)
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="d-block card position-relative text-decoration-none" style="min-height: 330px; border:none;">
                        <div class="content-image"> {!! $v->image !!} </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                <span class="font-size-18 mb-1 d-block text-blue text-uppercase">{{ $v->content_1 }}</span>
                                <div class="font-size-15" style="font-weight: 300;">{!!$v->content_2!!}</div>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach                
        </section> 
    @endif
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
