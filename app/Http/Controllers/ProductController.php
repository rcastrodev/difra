<?php

namespace App\Http\Controllers;

use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function content()
    {
        $content = Content::where('section_id', 6)->first();
        return view('administrator.product.content', compact('content'));
    }

    public function create()
    {
        $categories = Category::all();     
        return view('administrator.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if ($request->has('outstanding'))
            $data['outstanding'] = 1;
        else
            $data['outstanding'] = 0;

        if($request->hasFile('extra')) 
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');

        if($request->hasFile('extra2'))            
            $data['extra2'] = $request->file('extra2')->store('images/data-sheet','custom');


        if($request->hasFile('extra3'))            
            $data['extra3'] = $request->file('extra3')->store('images/data-sheet','custom');


        if($request->hasFile('extra4'))            
            $data['extra4'] = $request->file('extra4')->store('images/data-sheet','custom');

        if($request->hasFile('extra7'))            
            $data['extra7'] = $request->file('extra7')->store('images/downloads','custom');
          

        $product = Product::create($data);                    
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }
 
        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $numberOfImagesAllowed = 10 - $product->images()->count();
        return view('administrator.product.edit', compact('product', 'categories', 'numberOfImagesAllowed'));
    }

    public function update(ProductRequest $request)
    {   

        $data = $request->all(); 
        if ($request->has('outstanding'))
            $data['outstanding'] = 1;
        else
            $data['outstanding'] = 0;

        $product = Product::find($request->input('id'));

        if($request->hasFile('extra')){
            if (Storage::disk('custom')->exists($product->extra))
                    Storage::disk('custom')->delete($product->extra);
            
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');
        }

        if($request->hasFile('extra2')){
            if (Storage::disk('custom')->exists($product->extra2))
                    Storage::disk('custom')->delete($product->extra2);
            
            $data['extra2'] = $request->file('extra2')->store('images/data-sheet', 'custom');
        }

        if($request->hasFile('extra3')){
            if (Storage::disk('custom')->exists($product->extra3))
                    Storage::disk('custom')->delete($product->extra3);
            
            $data['extra3'] = $request->file('extra3')->store('images/data-sheet', 'custom');
        }

        if($request->hasFile('extra4')){
            if (Storage::disk('custom')->exists($product->extra4))
                    Storage::disk('custom')->delete($product->extra4);
            
            $data['extra4'] = $request->file('extra4')->store('images/data-sheet', 'custom');
        }

        if($request->hasFile('extra7')){
            if (Storage::disk('custom')->exists($product->extra7))
                    Storage::disk('custom')->delete($product->extra7);
            
            $data['extra7'] = $request->file('extra7')->store('images/downloads', 'custom');
        }


        $product->update($data);        
                    
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }

        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function updateInfo(Request $request)
    {
        Content::find($request->input('id'))->update($request->all());
        return back();   
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        return DataTables::of(Product::query())
        ->editColumn('description', function($product) {
            return $product->description;
        })
        ->addColumn('category', function($product) {
            return $product->category->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'description'])
        ->make(true);
    }

    public function borrarImagenDescriptiva($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->picture_description))
            Storage::disk('public')->delete($product->picture_description);

        $product->picture_description = null;
        $product->save();

        return response()->json([], 200);
    }

    public function fichaTecnica($id, $campo)
    {
        $producto = Product::findOrFail($id);  

        if (Storage::disk('custom')->exists($producto->$campo)) 
            return Response::download($producto->$campo); 
        else
            return back();  

    }

    public function borrarFichaTecnica($id, $campo)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->$campo))
            Storage::disk('public')->delete($product->$campo);

        $product->$campo = null;
        $product->save();

        return response()->json([], 200);
    }
}
