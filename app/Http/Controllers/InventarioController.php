<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventario;
use App\Models\Units;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::select('i.name', 'i.presentation', 'c.name as category_name', 'u.name as unit_name')
            ->from('inventarios as i')
            ->join('categories as c', 'c._id', '=', 'i.category_id')
            ->join('units as u', 'u._id', '=', 'i.unit_id')
            ->get();
        return view('inventario.index', compact('inventarios'));
    }


    public function create()
    {
        $categorias = Category::pluck('name', '_id');
        $unidades = Units::pluck('name', '_id');

        return view('inventario.create', compact('categorias', 'unidades'));
    }

    public function store(Request $request)
    {

        $storeInventario = new Inventario();
        $storeInventario->name = strtoupper($request->name);
        $storeInventario->category_id = $request->category_id;
        $storeInventario->unit_id = strtoupper($request->unit);
        $storeInventario->presentation = strtoupper($request->presentation);
        $storeInventario->save();


        return redirect()->route('inventario.index');
    }
}
