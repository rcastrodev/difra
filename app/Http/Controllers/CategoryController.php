<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function content()
    {
        return view('administrator.category.content');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nombre de la categoría es obligatorio'
        ]);

        Category::create($request->all());

        return response()->json(['tableReload' => true],201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nombre de la categoría es obligatorio'
        ]);

        Category::find($request->input('id'))->update($request->all());
        return response()->json(['tableReload' => true],201);
    }

    public function findContent($id)
    {
        $content = Category::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        $element = Category::find($id);

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
        $sliders = Category::all();

        return DataTables::of($sliders)
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

}
