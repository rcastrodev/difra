@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">CLIENTES</li>
		</ol>
	</div>
</div>
@isset($clients)
    @if ($clients->count())
        <section class="d-flex flex-wrap my-3 container mx-auto my-sm-3 py-md-5">
            @foreach ($clients as $v)
            <div class="content-client d-flex justify-content-center align-items-center" style="height: 140px;">
                <img src="{{ asset($v->image) }}" class="img-fluid">
            </div>
            @endforeach                
        </section> 
    @endif
@endisset
@endsection
@push('head')
    <style>
        .content-client{
            width: 15%;
            margin: 10px 5px 0px;
            padding: 10px;
            border: 1px solid #becad626;
        }

        @media(max-width:768px){
            .content-client{
                width: 18%;
                margin: 10px 5px 0px;
                padding: 10px;
                border: 1px solid #becad626;
            }
        }

        @media(max-width:500px){
            .content-client{
                width: 45%;
                margin: 10px 5px 0px;
                padding: 10px;
                border: 1px solid #becad626;
            }
        }


    </style>
@endpush
