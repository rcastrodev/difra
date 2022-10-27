<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Phpfastcache\Helper\Psr16Adapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3   = $sections->where('name', 'section_3')->first()->contents()->first();
        $products   = Product::orderBy('order', 'ASC')->where('outstanding', 1)->get();
        $clients     = Content::where('section_id', 10)->orderBy('order', 'ASC')->get();
        $instagramImages = [];
        
        try {
            $instagramImages = $this->galleryIg();
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        
        return view('paginas.index', compact('section1s', 'section2', 'section3', 'products', 'clients', 'instagramImages'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections = $page->sections;
        $section1s = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        SEO::setTitle('empresa');
        SEO::setDescription(strip_tags($section2->content_2));
        return view('paginas.empresa', compact('section1s', 'section2'));
    }

    public function productos(Request $request)
    {
        $b = $request->get('b');

        if ($request->get('b')){
            $products = Product::where('name', 'like', "%{$b}%")->orderBy('order', 'ASC')->get();
        }else{
            $products = Product::orderBy('order', 'ASC')->get();
        }
        
        $content = Content::where('section_id', 6)->first();
        return view('paginas.productos', compact('products', 'content'));
    }

    public function producto(Request $request, Product $product)
    {
        if ($product){
            SEO::setTitle($product->name);
            SEO::setDescription(strip_tags($product->description));
        }
        $relatedProducts = $product->category->products()->where('id', '<>', $product->id)->inRandomOrder()->get();
        return view('paginas.producto', compact('product', 'relatedProducts'));
    }

    public function servicioTecnico()
    {
        SEO::setTitle('servicio técnico');
        SEO::setDescription(strip_tags($this->data->description));
        $services = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();
        return view('paginas.servicios', compact('services'));
    }


    public function aplicaciones()
    {
        SEO::setTitle('aplicaciones');
        SEO::setDescription(strip_tags($this->data->description));
        $applications  = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();
        return view('paginas.aplicaciones', compact('applications'));
    }

    public function descargas()
    {
        SEO::setTitle('descargas');
        SEO::setDescription(strip_tags($this->data->description));
        $products  = Product::orderBy('order', 'ASC')->get();
        $content = Content::where('section_id', 6)->first();
        return view('paginas.descargas', compact('products', 'content'));
    }

    public function zonaDescarga(request $request)
    {
        if (! $request->session()->get('validate-customer') || Auth::check()) 
            return redirect()->route('index');
            
        SEO::setTitle('zona de descargas');
        SEO::setDescription(strip_tags($this->data->description));
        $products  = Product::orderBy('order', 'ASC')->get();
        $content = Content::where('section_id', 6)->first();
        return view('paginas.zona-de-descarga', compact('products', 'content'));    
    }

    public function videos()
    {
        SEO::setTitle('videos');
        SEO::setDescription(strip_tags($this->data->description));
        $videos = Content::where('section_id', 9)->orderBy('order', 'ASC')->get();
        return view('paginas.videos', compact('videos'));
    }

    public function clientes()
    {
        SEO::setTitle('clientes');
        SEO::setDescription(strip_tags($this->data->description));
        $clients = Content::where('section_id', 10)->orderBy('order', 'ASC')->get();
        return view('paginas.clientes', compact('clients'));
    }

    public function cotizacion()
    {
        $page = Page::where('name', 'cotizacion')->first();
        SEO::setTitle("cotizaci&oacute;n");
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.cotizacion');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto"); 
        SEO::setDescription(strip_tags($this->data->description));      
        return view('paginas.contacto');
    }

    public function certificado($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->content_3);  
    }

    protected function galleryIg()
    {
        $client = new \GuzzleHttp\Client();
        
        $instagram = \InstagramScraper\Instagram::withCredentials($client, 'difracnc@gmail.com', '1898peron', new Psr16Adapter('Files'));
        $instagram->login(); // will use cached session if you want to force login $instagram->login(true)
        $instagram->saveSession();  //DO NOT forget this in order to save the session, otherwise have no sense
        $account = $instagram->getAccount('difracnc');
        $accountMedias = $account->getMedias(); 
        $root = [];
        foreach ($accountMedias as $key  => $accountMedia) {
            $images[$key] = str_replace("&amp;","&", $accountMedia->getimageHighResolutionUrl());     
            $path = $images[$key];
            $imageName = $key.'.png';
            $root[] = "images/instagram$imageName";
            $img = public_path('images/instagram') . $imageName;
            file_put_contents($img, file_get_contents($path));

        }
        return $root;
    }
}
