@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">DESCARGAS</li>
		</ol>
	</div>
</div>
@isset($products)
    @if (count($products))
        <div class="py-sm-3 py-md-5">
            <div class="container">
                <p class="mb-5 font-size-20" style="color: #707070; font-weight:300;">{{ $content->content_4 }}</p>
                <div class="row justify-content-between">
                    <ul class="nav nav-tabs flex-column col-sm-12 col-md-3" id="myTab" role="tablist">
                        @foreach ($products as $k => $p)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-uppercase font-size-20 d-block w-100 text-start @if(!$k) active @endif" id="{{Str::slug($p->name, '-')}}-tab" data-bs-toggle="tab" data-bs-target="#{{Str::slug($p->name, '-')}}" type="button" role="tab" aria-controls="{{Str::slug($p->name, '-')}}" @if(!$k) aria-selected="true" @else aria-selected="false" @endif style="color: #04367D; font-weight:300;">{{$p->name}}</button>
                            </li>               
                        @endforeach
                    </ul>
                    <div class="tab-content col-sm-12 col-md-8" id="myTabContent">
                        @foreach ($products as $k => $p)
                            <div class="tab-pane fade @if(!$k) show active @endif" id="{{Str::slug($p->name, '-')}}" role="tabpanel" aria-labelledby="{{Str::slug($p->name, '-')}}-tab">
                                <div class="table-responsive">
                                    <table class="table tabla-descargas">
                                        <tr>
                                            <th class="text-blue" style="font-weight: 400;">NOMBRE</th>
                                            <th class="text-center text-blue" style="font-weight: 400;">FORMATO</th>
                                            <th class="text-center text-blue" style="font-weight: 400;">DESCARGAR</th>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 400;">Manual de Pre-instalaci&oacute;n</td>
                                            <td class="text-center">PDF</td>
                                            
                                            <td class="text-center">
                                                @if($p->extra2)
                                                    <a href="{{ route('ficha-tecnica', ['id'=> $p->id, 'campo' => 'extra2']) }}" style="color:#189FAC;"><i class="fas fa-download"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 400;">Manual de Operaci&oacute;n</td>
                                            <td class="text-center">PDF</td>
                                            <td class="text-center">
                                                @if($p->extra3)
                                                    <a href="{{ route('ficha-tecnica', ['id'=> $p->id, 'campo' => 'extra3']) }}" style="color:#189FAC;"><i class="fas fa-download"></i></a>
                                                @endif
                                            </td>
                                        </tr>                          
                                        <tr>
                                            <td style="font-weight: 400;">Manual de Mantenimiento</td>
                                            <td class="text-center">PDF</td>
                                            <td class="text-center">
                                                @if($p->extra4)
                                                    <a href="{{ route('ficha-tecnica', ['id'=> $p->id, 'campo' => 'extra4']) }}" style="color:#189FAC;"><i class="fas fa-download"></i></a>
                                                @endif
                                            </td>
                                        </tr> 
                                        @if (Auth::check())
                                            <tr>
                                                <td style="font-weight: 400;">Drivers</td>
                                                <td class="text-center">.ZIP</td>
                                                <td class="text-center">
                                                    @if($p->extra7)
                                                        <a href="{{ route('ficha-tecnica', ['id'=> $p->id, 'campo' => 'extra7']) }}" style="color:#189FAC;"><i class="fas fa-download"></i></a>
                                                    @endif
                                                </td>
                                            </tr>  
                                        @endif
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>      
    @endif
@endisset
@endsection
