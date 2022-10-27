<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('head')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="author" content="rcastrodev">
    <link rel="stylesheet" href="{{ asset('css/bootstrapv5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    {!! SEO::generate() !!}
</head>
<body>
    @include('paginas.partials.header')
    @yield('content')
    <!-- Button trigger modal -->

    
    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="message-customer-login" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('customer.login') }}" method="post" id="customer-login" class="row modal-content" autocomplete="off">
                <div class="modal-header col">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body col">
                    {{ csrf_field() }}
                    <div id="message-customer-login" class="mb-4" style="color: red;"></div>
                    {{-- Name field --}}
                    <div class="input-group mb-3 col-sm-12 col-md-6">
                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email') }}" placeholder="Correo"  autofocus
                        >
                    </div>
        
                    {{-- Password field --}}
                    <div class="input-group mb-3 col-sm-12 col-md-6">
                        <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('adminlte::adminlte.password') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    {{-- Register button --}}
                    <button type="submit" class="btn btn-block col-sm-12 col-md-6 {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">Entrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('customer.store') }}" method="post" id="customer-register" class="row modal-content" autocomplete="off">
                <div class="modal-header col">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body col">
                    {{ csrf_field() }}
                    <div id="message-customer" class="mb-4" style="color: red;"></div>
                    {{-- Name field --}}
                    <div class="input-group mb-3 col-sm-12 col-md-6">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            value="{{ old('name') }}" placeholder="Nombre"  autofocus
                        >
                    </div>

                    {{-- Name field --}}
                    <div class="input-group mb-3 col-sm-12 col-md-6">
                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email') }}" placeholder="Correo"  autofocus
                        >
                    </div>
        
                    {{-- Password field --}}
                    <div class="input-group mb-3 col-sm-12 col-md-6">
                        <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('adminlte::adminlte.password') }}">
                    </div>
            
                    {{-- Confirm password field --}}
                    <div class="input-group col-sm-12 col-md-6">
                        <input type="password" name="password_confirmation"
                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    {{-- Register button --}}
                    <button type="submit" class="btn btn-block col-sm-12 col-md-6 {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                        <span class="fas fa-user-plus"></span>
                        Crear usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
    @include('paginas.partials.footer')
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/newsletter.js') }}"></script>
    <script>
        // Registrar Cliente
        let RegisterForm = document.getElementById('customer-register')
        if (RegisterForm) {
            RegisterForm.addEventListener('submit', function(e) {
                e.preventDefault()
                let formData = new FormData(e.currentTarget)
                let messageCustomer = document.getElementById('message-customer')

                if(! formData.get('name') || ! formData.get('email') || ! formData.get('password') || ! formData.get('password_confirmation')){
                        messageCustomer.textContent = 'Todos los datos son requeridos'
                        return null
                }

                axios.post(RegisterForm.getAttribute('action'), formData).then(r => {                    
                    setTimeout(() => {
                        location.reload();
                    }, 1000); 
                     
                }).catch(error =>{
                    messageCustomer.textContent = ''
                    console.error(error.response)
                    if (error.response.status == 422) {
                        let messageError = '<ul>'
                        for (const property in error.response.data.errors) {
                            messageError += `<li>${error.response.data.errors[property]}</li>`
                        }
                        messageError += '</ul>'

                        messageCustomer.innerHTML = messageError

                        setTimeout(() => {
                            messageCustomer.textContent = ''
                        }, 4000);
                    }
                })
            })
        }

        // Validad Cliente
        let LoginForm = document.getElementById('customer-login')
        if (LoginForm) {
            LoginForm.addEventListener('submit', function(e) {
                e.preventDefault()
                let messageCustomerLogin = document.getElementById('message-customer-login')
                let formData = new FormData(e.currentTarget)
                
                if(! formData.get('email') || ! formData.get('password')){
                    messageCustomerLogin.textContent = 'Ambos datos son ablogatorios'
                    return null
                }
                    

                axios.post(LoginForm.getAttribute('action'), formData).then(r => {
                    if(! parseInt(r.data.id)){
                        messageCustomerLogin.textContent = 'Usuario o clave incorrecta'
                        setTimeout(() => {
                            messageCustomerLogin.textContent = ''
                        }, 4000);
                    }else{
                        setTimeout(() => { location.reload() }, 1000);
                    } 
                }).catch(error =>{
                    messageCustomerLogin.textContent = ''
                    console.error(error)
                })
            })
        }
    </script>
    @stack('scripts')
</body>
</html>