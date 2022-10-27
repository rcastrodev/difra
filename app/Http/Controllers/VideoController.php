<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'videos')->first();
    }

    public function content()
    {
        return view('administrator.video.content');
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function rules(Request $request)
    {
        $request->validate([
            'content_1' => 'required',
            'content_2' => 'required',
        ], [
            'content_1.required' => 'Video requerido',
            'content_2.required' => 'Título requerido',
        ]);
    }

    public function store(Request $request)
    {
        $this->rules($request);
        Content::create($request->all());

        return back();
    }

    public function update(Request $request)
    {
        $this->rules($request);
        Content::find($request->input('id'))->update($request->all());

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

    public function getList()
    {
        $elements = $this->page->sections()->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return $element->image;
        })
        ->addColumn('content_2', function($element) {
            return $element->content_2;
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }
}
