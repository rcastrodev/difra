<div id="pre-header" class="d-sm-none d-md-block bg-blue2 font-size-12 py-2">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fas fa-map-marker-alt text-white me-1"></i> 
                    <address class="text-white mb-0">{{$data->address}}</address>
                </div>
                <div class="d-inline-block email me-3">
                    <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-light underline underline" style="z-index: 100;">
                        <i class="fas fa-envelope text-white me-1"></i> {{ $data->email }}
                    </a>
                </div>
                <div class="me-3 d-inline-block">
                    <i class="fas fa-phone-alt text-white me-1"></i> 
                    @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                    @if (count($phone1) == 2)
                        <a href="tel:{{$phone1[0]}}" class="text-light underline underline">{{ $phone1[1] }}</a>
                    @else 
                        <a href="tel:{{$data->phone1}}" class="text-light underline underline">{{ $data->phone1 }}</a>
                    @endif   
                </div>
                <div class="me-3 d-inline-block">
                    <i class="fab fa-whatsapp text-white me-1"></i> 
                    @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
                    @if (count($phone3) == 2)
                        <a href="https://wa.me/{{$phone3[0]}}" class="text-light underline underline">{{ $phone3[1] }}</a>
                    @else 
                        <a href="https://wa.me/{{$data->phone3}}" class="text-light underline underline">{{ $data->phone3 }}</a>
                    @endif   
                </div>
            </div>
            <div class="d-flex align-items-center" style="z-index: 100;">
                @if (session('validate-customer'))
                    <span class="text-white font-size-12 text-uppercase d-block me-3">{{ current_customer(session('validate-customer'))->name }}</span>
                    <a href="{{ route('customer.session-destroy') }}" class="text-uppercase text-white text-decoration-none me-3">Salir</a>
                @else
                    <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#login">Iniciar sesi&oacute;n</button>
                    <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#register">Registrarse</button>
                @endif
                
                <div id="redes-sociales">    
                    @if ($data->instagram)
                        <a href="{{$data->instagram}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-instagram"></i>
                        </a>                
                    @endif
                    @if ($data->facebook)
                        <a href="{{$data->facebook}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-facebook-f"></i>
                        </a>            
                    @endif
                    @if ($data->youtube)
                        <a href="{{$data->youtube}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-youtube"></i>
                        </a>               
                    @endif
                    @if ($data->pinterest)
                        <a href="{{$data->pinterest}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-pinterest-p"></i>
                        </a>            
                    @endif
                    @if ($data->twitter)
                        <a href="{{$data->twitter}}" class="text-white text-decoration-none p-2 py-3">
                            <i class="fab fa-twitter"></i>
                        </a>               
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>
        <div class="d-sm-block d-md-none">
            @if (session('validate-customer'))
                <span class="text-white font-size-12 text-uppercase d-block me-3 text-customer">{{ current_customer(session('validate-customer'))->name }}</span>
                <a href="{{ route('customer.session-destroy') }}" class="text-uppercase text-white text-decoration-none me-3 text-customer">Salir</a>
            @else
                <button type="button" class="btn text-white text-customer" data-bs-toggle="modal" data-bs-target="#login">Iniciar sesi&oacute;n</button>
                <button type="button" class="btn text-white text-customer" data-bs-toggle="modal" data-bs-target="#register">Registrarse</button>
            @endif
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center text-uppercase position-relative py-md-4 py-sm-2" id="navbarNav">
            <ul class="navbar-nav justify-content-end align-items-center w-100">
                @if (session('validate-customer'))
                    <li class="nav-item @if(Request::is('zona-de-descarga')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('zona-de-descarga')) active @endif" href="{{ route('zona-de-descarga') }}">DESCARGA DE SOFTWARE</a>
                    </li>
                @else 

                    <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">QUIENES SOMOS</a>
                    </li>
                    <li class="nav-item @if(Request::is('equipos') || Request::is('equipo/*') ) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('equipos') || Request::is('equipo/*')) active @endif" href="{{ route('productos') }}">EQUIPOS</a>
                    </li>
                    <li class="nav-item @if(Request::is('servicio-tecnico')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('servicio-tecnico')) active @endif" href="{{ route('servicio-tecnico') }}">SERVICIO T&Eacute;CNICO</a>
                    </li>
                    <li class="nav-item @if(Request::is('aplicaciones')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('aplicaciones')) active @endif" href="{{ route('aplicaciones') }}">APLICACIONES</a>
                    </li>
                    <li class="nav-item @if(Request::is('descargas')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('descargas')) active @endif" href="{{ route('descargas') }}">DESCARGAS</a>
                    </li>
                    <li class="nav-item @if(Request::is('videos')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('videos')) active @endif" href="{{ route('videos') }}">VIDEOS</a>
                    </li>
                    <li class="nav-item @if(Request::is('clientes')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('clientes')) active @endif" href="{{ route('clientes') }}">CLIENTES</a>
                    </li>
                    <li class="nav-item @if(Request::is('solicitud-de-presupuesto')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('solicitud-de-presupuesto')) active @endif" href="{{ route('cotizacion') }}">SOLICITUD DE PRESUPUESTO</a>
                    </li>
                    <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                        <a class="nav-link text-dark @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >CONTACTO</a>
                    </li>
                    <li>
                        <form action="{{ route('productos') }}"  class="form-pre-header">
                            <div class="input-group">
                                <input type="text" name="b" class="form-control bg-transparent border-end-0 input-search p-0" placeholder="Buscar ...">
                                <button type="submit" class="input-group-text bg-transparent border-start-0"><i class="fas fa-search text-dark"></i></button>
                            </div>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>  
