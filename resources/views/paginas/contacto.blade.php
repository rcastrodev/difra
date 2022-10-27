@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-blue2 text-uppercase fw-bold">Inicio</a></li>
			<li class="breadcrumb-item active text-blue text-uppercase" aria-current="page">CONTACTO</li>
		</ol>
	</div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4636.305583036369!2d-58.43115850004139!3d-34.746444676297315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccd639b9d2ff3%3A0xc3e0de862f64943f!2sPres.%20Juan%20Domingo%20Per%C3%B3n%201898%2C%20B1832EYS%20Lomas%20de%20Zamora%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses-419!2smx!4v1637719873482!5m2!1ses-419!2smx" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="rMenu"></iframe>
<div class="my-5">
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
        <form action="{{ route('send-contact') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt me-3" style="color: #189FAC; font-size: 20px;"></i> 
                        <address class="mb-0" style="color: #1F1A15;">{{$data->address}}</address>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope font-size-18 d-block me-3" style="color: #189FAC;"></i><span class="d-block"></span>  
                        <a href="mailto:{{ $data->email }}" class="underline" style="color: #1F1A15;">{{ $data->email }}</a>                      
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone-alt font-size-18 d-block me-3" style="color: #189FAC;"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0] }}" class="underline" style="color: #1F1A15;">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{ $data->phone1 }}" class="underline" style="color: #1F1A15;">{{ $data->phone1 }}</a>
                        @endif       
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fab fa-whatsapp font-size-18 d-block me-3" style="color: #189FAC;"></i>
                        @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
                        @if (count($phone3) == 2)
                            <a href="https://wa.me/{{ $phone3[0] }}" class="underline" style="color: #1F1A15;">{{ $phone3[1] }}</a>
                        @else 
                            <a href="https://wa.me/{{ $data->phone3 }}" class="underline" style="color: #1F1A15;">{{ $data->phone3 }}</a>
                        @endif       
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="empresa" placeholder="Empresa" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad *</label>
                              </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3">
                            <button type="submit" class="text-uppercase btn bg-green font-size-14 py-2 font-weight-600 mb-sm-3 mb-md-0 ancho-boton text-white px-5" style="border-radius: 0 !important;">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

