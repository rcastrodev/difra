<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');

Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/equipos', 'PagesController@productos')->name('productos');
Route::get('/equipo/{product}', 'PagesController@producto')->name('producto');
Route::get('/servicio-tecnico', 'PagesController@servicioTecnico')->name('servicio-tecnico');
Route::get('/aplicaciones', 'PagesController@aplicaciones')->name('aplicaciones');
Route::get('/descargas', 'PagesController@descargas')->name('descargas');
Route::get('/zona-de-descarga', 'PagesController@zonaDescarga')->name('zona-de-descarga');
Route::get('/videos', 'PagesController@videos')->name('videos');
Route::get('/clientes', 'PagesController@clientes')->name('clientes');
Route::get('/solicitud-de-presupuesto', 'PagesController@cotizacion')->name('cotizacion');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');

Route::get('/certificado/{id}', 'PagesController@certificado')->name('certificado');

Route::get('/ficha-tecnica/{id}/{campo}', 'ProductController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}/{campo}', 'ProductController@borrarFichaTecnica')->name('borrar-ficha-tecnica');
Route::post('/imagen-descrptiva/{id}', 'ProductController@borrarImagenDescriptiva')->name('borrar-imagen-descriptiva');

Route::post('vp', 'VPController@addVP')->name('vp.store');
Route::get('vp', 'VPController@getSession')->name('vp');
Route::delete('vp/{id}', 'VPController@destroy')->name('vp.destroy');

Route::post('customer/store', 'CustomerController@register')->name('customer.store');
Route::post('customer/login', 'CustomerController@login')->name('customer.login');
Route::get('customer/session-destroy', 'CustomerController@sessionDestroy')->name('customer.session-destroy');

Route::group(['middleware' => ['role:Administrador|Gestor'], 'prefix' => 'admin'], function() {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.generic-section.update');
    Route::post('home/updateInfo', 'HomeController@updateInfo')->name('home.update-info');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::post('home/content/{id}', 'HomeController@certificateDestroy')->name('home.content.certificate-destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    /** Fin company*/

    /** Page Category */
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::get('category/content/{id}', 'CategoryController@findContent');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content/update', 'CategoryController@update')->name('category.content.update');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/slider/get-list', 'CategoryController@sliderGetList')->name('category.slider.get-list');
    /** Fin Category*/

    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::post('product/content/', 'ProductController@updateInfo')->name('product.update-info');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    /** Fin product*/

    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    /** Page Technical Service */
    Route::get('technical-service/content', 'TechnicalServiceController@content')->name('technical-service.content');
    Route::post('technical-service/content/generic-section/store', 'TechnicalServiceController@store')->name('technical-service.content.generic-section.store');
    Route::post('technical-service/content/generic-section/update', 'TechnicalServiceController@update')->name('technical-service.content.generic-section.update');
    Route::delete('technical-service/content/{id}', 'TechnicalServiceController@destroy')->name('technical-service.content.destroy');
    Route::get('technical-service/content/slider/get-list', 'TechnicalServiceController@sliderGetList')->name('technical-service.slider.get-list');
    /** Fin Technical Service*/

    /** Page Applications */
    Route::get('Applications/content', 'ApplicationController@content')->name('application.content');
    Route::post('Applications/content/generic-section/store', 'ApplicationController@store')->name('application.content.generic-section.store');
    Route::post('Applications/content/generic-section/update', 'ApplicationController@update')->name('application.content.generic-section.update');
    Route::delete('Applications/content/{id}', 'ApplicationController@destroy')->name('application.content.destroy');
    Route::get('Applications/content/slider/get-list', 'ApplicationController@sliderGetList')->name('application.slider.get-list');
    /** Fin Technical Applications*/

    /** Page videos */
    Route::get('video/content', 'VideoController@content')->name('video.content');
    Route::post('video/content/generic-section/store', 'VideoController@store')->name('video.content.generic-section.store');
    Route::post('video/content/generic-section/update', 'VideoController@update')->name('video.content.generic-section.update');
    Route::delete('video/content/{id}', 'VideoController@destroy')->name('video.content.destroy');
    Route::get('video/content/slider/get-list', 'VideoController@getList')->name('video.slider.get-list');
    /** Fin videos*/

    /** Page Clients */
    Route::get('client/content', 'ClientController@content')->name('client.content');
    Route::post('client/content/generic-section/store', 'ClientController@store')->name('client.content.generic-section.store');
    Route::post('client/content/generic-section/update', 'ClientController@update')->name('client.content.generic-section.update');
    Route::delete('client/content/{id}', 'ClientController@destroy')->name('client.content.destroy');
    Route::get('client/content/slider/get-list', 'ClientController@sliderGetList')->name('client.slider.get-list');
    /** Fin Clients*/

    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/

    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    
    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
