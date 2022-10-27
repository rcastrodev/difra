<?php

namespace App\Http\Controllers;

use App\Data;
use App\Newsletter;
use App\Mail\QuoteEmail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function quote(Request $request)
    {
        $request->validate([
            'nombre'                => 'required',
            'email'                 => 'required|email:rfc,dns',
            'telefono'              => 'required',
        ], [
            'nombre.required'           => 'Nombre es requerido',
            'email.required'            => 'Correo es requerido',
            'email.email'               => 'el correo de tener un formato valido',
            'telefono.required'         => 'Teléfono es requerido',
        ]);

        $data = $request->all();

        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'custom');

        $email = Data::first()->email;

        try {

            Mail::to($email)->send(new QuoteEmail($data));
            $mensaje = 'Correo enviado, nuestro equipo se pondra en contacto con usted';
            $class = 'success';

        } catch (\Throwable $th) {
            $mensaje = 'Error al enviar correo';
            $class = 'danger';
            Log::error($th->getMessage());
        }

        return back()->with('mensaje', $mensaje)
            ->with('class', $class);
        
    } 

    public function contact(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'nombre'    => 'required',
            'nombre'    => 'required',
            'email'     => 'required|email:rfc,dns',
            'termino'   => 'required'
        ],[
            'g-recaptcha-response.required' => 'Debe validar que no es un robot',
            'g-recaptcha-response.captcha'  => 'Debe validar que no es un robot',
            'nombre.required'               => 'Nombre es requerido',
            'email.required'                => 'Correo es requerido',
            'email.email'                   => 'Correo debe tener un formato valido',
            'termino.required'              => 'Debe aceptar los terminos'
        ]);

        $email = Data::first()->email;
        $data = $request->all();

        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'custom');
            
        try {
            Mail::to($email)  
                ->send(new ContactMail($data));
            
            $mensaje = 'Correo enviado, nuestro equipo se pondra en contacto con usted';
            $class = 'success';

        } catch (\Throwable $th) {
            $mensaje = 'Error al enviar correo';
            $class = 'danger';
            Log::error($th->getMessage());
        }

        return back()
            ->with('mensaje', $mensaje)
            ->with('class', $class);
    }
}