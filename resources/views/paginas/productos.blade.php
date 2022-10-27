@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">PRODUCTOS</li>
		</ol>
	</div>
</div>
@isset($content)
    <div class="py-sm-3 py-md-5">
        <div class="container">
            <h2 class="mb-4 text-uppercase font-size-32 text-blue col-sm-12 pb-2 fw-light">{{ $content->content_1 }}</h2>
            <div class="row">
                <div class="col-sm-12 col-md-6 font-size-15">{!! $content->content_2 !!}</div>
                <div class="col-sm-12 col-md-6 font-size-15">{!! $content->content_3 !!}</div>
            </div>
        </div>
    </div>
@endisset
@isset($products)
    <div class="pb-2">
        <div class="container">
            <div class="">
                @if ($products->count())
                    <section class="producto row font-size-14 my-3">
                        @foreach ($products as $p)
                            <div class="col-sm-12 col-md-3 mb-3">
                                @includeIf('paginas.partials.producto', ['product' => $p])
                            </div>
                        @endforeach                
                    </section>    
                @else
                    <h2 class="text-center my-5">No tenemos productos cargados con esta característica</h2>
                @endif
            </div>
        </div>
    </div>
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
