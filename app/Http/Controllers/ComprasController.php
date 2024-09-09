<?php

namespace App\Http\Controllers;

use App\Models\{Compras, ComprasDetalles, Inventario, ListaCompras};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function index()
    {
        $data = Compras::select('_id', 'total', 'date')->get();
        return view('compras.index', compact('data'));
    }


    public function create()
    {
        // $inv = Inventario::all();

        $inv = Inventario::select('i._id', 'i.name', 'i.presentation', 'u.name as unit_name')
            ->from('inventarios as i')
            ->join('categories as c', 'c._id', '=', 'i.category_id')
            ->join('units as u', 'u._id', '=', 'i.unit_id')
            ->orderBy('i.name', 'asc')
            ->get();
        return view('compras.create', compact('inv'));
    }

    public function store(Request $request)
    {
        // return $request;
        $total_compras = 0;
        $compras = new Compras();



        if ($request->tipo == 'lista') {
            foreach ($request->qty as $keyy => $value) {
                $qty = 0;
                $price = 0;
                if ($value[0] != null) {
                    $qty = $value[0];
                    $price = $request->price[$keyy][0];
                    $t = ($qty * $price);
                    $total_compras += $t;
                }
            }


            $compras->date = date('Y-m-d');
            $compras->total = $total_compras;
            $compras->save();

            $compra_id = $compras->_id;

            foreach ($request->qty as $keyy => $value) {
                $qty = 0;
                $price = 0;
                if ($value[0] != null) {
                    $qty = $value[0];
                    $price = $request->price[$keyy][0];
                    $t = ($qty * $price);
                    $total_compras += $t;

                    $detalle = new ComprasDetalles();
                    $detalle->compra_id = $compra_id;
                    $detalle->qty = $qty;
                    $detalle->product_id = $keyy;
                    $detalle->price = $price;
                    $detalle->total = $t;
                    $detalle->save();
                }
            }

            $lista = ListaCompras::find($request->id_lista);
            $lista->active = 0;
            $lista->save();

            return redirect()->route('lista.index');
        } elseif ($request->tipo == 'compra') {

            foreach ($request->total as $k => $value) {
                $total_compras += $value;
            }



            $compras->date = $request->date;
            $compras->total = $total_compras;
            $compras->save();

            $compra_id = $compras->_id;


            foreach ($request->total as $k => $value) {
                $detalle = new ComprasDetalles();
                $detalle->compra_id = $compra_id;
                $detalle->qty = $request->qty[$k];
                $detalle->product_id = $request->product_id[$k];
                $detalle->price = $request->price[$k];
                $detalle->total = $request->total[$k];
                $detalle->save();
            }



            return back();
        } else {
            return  'error';
        }
    }


    public function show($id)
    {
        $dataCompra = Compras::find($id);

        $dataDetalle = ComprasDetalles::select('i.name', 'i.presentation', 'cat.name as category_name', 'u.name as unit_name', 'd.qty', 'd.price', 'd.total as sub')
            ->from('compras_detalles as d')
            ->join('inventarios as i', 'd.product_id', '=', 'i._id')
            ->join('categories as cat', 'i.category_id', '=', 'cat._id')
            ->join('units as u', 'i.unit_id', '=', 'u._id')
            ->where('d.compra_id', '=', $id)
            ->get();

        // return $dataCompra;

        return view('compras.show', compact('dataCompra', 'dataDetalle'));
    }


    public function listaIndex()
    {
        $data = ListaCompras::where('active', '=', 1)->get();

        $lista = [];

        if (count($data) > 0) {


            // return $arr;

            foreach ($data as $key => $value) {
                $arr = json_decode($value['lista'], true, JSON_FORCE_OBJECT);
                foreach ($arr as $key2 => $value2) {
                    $lista[$key2] = $value2;
                }
            }

            // return $lista;
            return view('lista.index', compact('lista', 'data'));
        } else {
            return redirect()->route('lista.create');
        }
    }

    public function listaCreate()
    {

        $inv = Inventario::select('i._id', 'i.name', 'i.presentation', 'u.name as unit_name')
            ->from('inventarios as i')
            ->join('categories as c', 'c._id', '=', 'i.category_id')
            ->join('units as u', 'u._id', '=', 'i.unit_id')
            ->orderBy('i.name', 'asc')
            ->get();

        return view('lista.create', compact('inv'));
    }




    public function listaStore(Request $request)
    {
        $activa = ListaCompras::where('active', '=', 1)->get();
        // return $request;

        if (count($activa) == 0) {
            $arr = [];
            foreach ($request->lista as $ke => $value) {
                if ($value['qty'] != null) {
                    $arr[$value['producto']] = ["nombre" => $value['producto'], "cantidad" => $value['qty'], "product_id" => $ke];
                }
            }

            // return $arr;

            $lista = new ListaCompras();
            $lista->date = date('Y-m-d');
            $lista->lista = json_encode($arr);
            $lista->save();
        } else {
            return 'tienes una lista activa';
        }

        return back();
    }
}
