<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'aplicaciones')->first();
    }

    /**
     * @author Raul castro
     */

    public function index()
    {
        return view('home');
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        return view('administrator.application.content');
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/applications', 'custom');

        $content = Content::create($data);

        return back();
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/applications','custom');
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

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $elements = Content::where('section_id', 8)->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            if (Storage::disk('custom')->exists($element->image)) 
                return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_2', function($element) {
            return $element->content_2;
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }
}
