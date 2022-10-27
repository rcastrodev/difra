<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomerController extends Controller
{
    use RegistersUsers;
    
    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'password'  => ['required', 'string', 'confirmed'],
            'email'     => ['required', 'email:rfc,dns', 'unique:customers'],
        ], [
            'name.required'     => 'Nombre es requerido', 
            'name.string'       => 'Nombre debe ser un string',
            'name.max'          => 'El nombre no puede tener mas de 255 caracteres', 
            'email.unique'      => 'El correo ya se encuentra registrado', 
            'email.required'    => 'El correo requerido', 
            'email.email'       => 'El email de complir con el formato de correo', 
            'password.required' => 'Contraseña es requerida',
            'password.confirmed'=> 'Contraseña no coincide',
        ]);
    }

    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        session(['validate-customer' => $user->id]);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return response()->json([], 201);
    }

    public function login(Request $request)
    { 
        $customer = Customer::where('email', $request->input('email'))->first();

        if ($customer)
        {
            $valid = Hash::check( $request->input('password'), $customer->password);

            if ($valid){
                session(['validate-customer' => $customer->id]);
                return response()->json(['id' => $customer->id], 200);
            }else{
                return response()->json(['id' => null], 200);  
            }
        
        }
    
        return response()->json(['id' => null], 200);  
    }

    public function sessionDestroy(Request $request)
    {
        $request->session()->forget('validate-customer');
        return back();
    }

}
