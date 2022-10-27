<div id="pre-footer" class="bg-green d-flex justify-content-center align-items">
    <div class="">
        <div class="py-3">
            @if ($data->facebook)
                <a href="{{$data->facebook}}" class="text-white text-decoration-none p-2 py-3">
                    <i class="fab fa-facebook-f"></i>
                </a>  
            @endif
            @if ($data->instagram)
                <a href="{{$data->instagram}}" class="text-white text-decoration-none p-2 py-3">
                    <i class="fab fa-instagram"></i>
                </a>
            @endif
            @if ($data->linkedin)
                <a href="{{$data->linkedin}}" class="text-white text-decoration-none p-2 py-3">
                    <i class="fab fa-linkedin-in"></i>
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
<footer class="py-sm-2 py-md-5 font-size-14 text-sm-center text-md-start bg-blue">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-4">
                <div class="row justify-content-between d-sm-none d-md-flex">
                    <div class="col-sm-12 mb-4">
                        <h6 class="text-uppercase font-weight-600 text-light2">secciones</h6>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">QUIENES SOMOS</a>
                        <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">EQUIPOS</a>
                        <a href="{{ route('servicio-tecnico') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">SERVICIO TÉCNICO</a>
                        <a href="{{ route('aplicaciones') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">APLICACIONES</a>
                        <a href="{{ route('descargas') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">DESCARGAS</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('videos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">VIDEOS</a>
                        <a href="{{ route('clientes') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">CLIENTES</a>
                        <a href="{{ route('cotizacion') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">SOLICITUD DE PRESUPUESTO</a>
                        <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">CONTACTO</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 mb-sm-4 mb-md-0">
                <div class="row">
                    <div class="col-sm-12 newsletter">
                        <h6 class="text-uppercase text-light2 font-weight-600 mb-4">SUSCRIBITE AL NEWSLETTER</h6>
                        <form action="{{ route('newsletter.store') }}" id="formNewsletter">
                            @csrf
                            <div class="">
                                <label class="visually-hidden" for="">Username</label>
                                <div class="input-group font-size-12">
                                    <input type="email" name="email" autocomplete="off" class="form-control font-size-12" placeholder="Ingresa tu email" style="background-color: #f9f9f9; border-radius:0px;">
                                    <button type="submit" id="" class="input-group-text bg-green text-white"  style="border: none; border-radius:0px;"><i class="far fa-paper-plane color-white"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase text-light2 font-weight-600 mb-4">contacto</h6>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-light d-block me-2"></i>
                        <address class="d-block text-light m-0"> {{ $data->address }}</address>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="far fa-envelope text-light d-block me-2"></i><span class="d-block"></span>
                        <a href="mailto:{{ $data->email }}" class="text-light text-decoration-none underline">{{ $data->email }}</a>             
                    </div>
                    <div class="d-flex align-items-center mb-3">    
                        <i class="fas fa-phone-alt text-light me-2"></i>  
                        @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone1) == 2)
                            <a href="tel:{{$phone1[0]}}" class="text-light underline text-decoration-none">{{ $phone1[1] }}</a>
                        @else 
                            <a href="tel:{{$data->phone1}}" class="text-light underline text-decoration-none">{{ $data->phone1 }}</a>
                        @endif  
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
                        @if (count($phone3) == 2)
                            <a href="https://wa.me/{{$phone3[0]}}" class="text-light underline text-decoration-none">
                                <i class="fab fa-whatsapp text-light me-2"></i>
                                <span>{{$phone3[1]}}</span>
                            </a> 
                        @else 
                            <a href="https://wa.me/{{$data->phone3}}" class="text-light underline text-decoration-none">
                                <i class="fab fa-whatsapp text-light me-2"></i>
                                <span>{{$data->phone3}}</span>
                            </a> 
                        @endif   
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-white p-2 font-size-13 bg-blue2">
    <div class="container">
        <div class="d-flex justify-content-between">
            <span>© Copyright 2021 Difra CNC. Todos los derechos reservados</span>
            <a href="https://osole.com.ar/" class="text-white underline text-decoration-none">BY OSOLE</a>
        </div>
    </div>
</div>
@isset($data->phone3)
    @if (count($phone3) == 2)
        <a href="https://wa.me/{{$phone3[0]}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>  
    @else 
        <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>  
    @endif   
@endisset

