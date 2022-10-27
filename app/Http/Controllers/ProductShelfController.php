<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductShelfController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'ordernador-de-produccion')->first();
    }


    public function content()
    {
        $sections   = $this->page->sections;
        $section1   = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3s   = $sections->where('name', 'section_3')->first()->contents;

        return view('administrator.product-shelf.content', compact('section1', 'section2', 'section3s'));
    }
    

    public function storeSlider(Request $request)
    {
        $data = $request->all();
        
        $request->validate([
            'image'             => 'required'
        ],[
            'image.required'    =>  'Imagen es requerida'
        ]);

        $data['image'] = $request->file('image')->store('images/company','custom');
        
        Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function updateSlider(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/company','custom');
        }        
        $element->update($data);
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();    
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/company','custom');
        } 
        $element->update($data);
        return back();
    }


    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }

    public function sliderGetList()
    {
        $details = $this->page->sections()->where('name', 'section_3')->first();
        $details = $details->contents()->orderBy('order', 'ASC');

        return DataTables::of($details)
        ->editColumn('image', function($detail){
            return '<img src="'.asset($detail->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($detail) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$detail->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$detail->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
