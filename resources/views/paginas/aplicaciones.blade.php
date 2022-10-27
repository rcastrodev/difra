@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">APLICACIONES</li>
		</ol>
	</div>
</div>
@isset($applications)
    @if (count($applications))
        <section class="row container mx-auto py-sm-3 py-md-5">
            @foreach ($applications as $s)
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="card" style="border:none;">
                        @if (Storage::disk('custom')->exists($s->image))
                            <img src="{{ asset($s->image) }}" class="img-fluid img-product" style="min-height:250px; max-height: 250px !important;">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product" style="min-height:250px; max-height: 250px !important;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title font-size-18 text-blue" style="font-weight: 300">{{ $s->content_1 }}</h5>
                            <p class="card-text font-size-15" style="font-weight: 300">{!! $s->content_2 !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach                
        </section> 
    @endif
@endisset
@endsection
@push('head')
    <style>
        @media(min-width:992px){
            .card{
                min-height: 490px;
            }
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
