<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\ComprasDetalles;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $dataComparativa = Compras::select('i.name', 'c.date', 'd.price')
            ->from('compras as c')
            ->join('compras_detalles as d', 'd.compra_id', '=', 'c._id')
            ->join('inventarios as i', 'i._id', '=', 'd.product_id')
            ->orderBy('c.date', 'ASC')
            ->get('compras');

        $resultComparativa = [];
        $maxElementos = 0;
        $productoConMasElementos = null;
        foreach ($dataComparativa as $item) {
            $name = $item["name"];
            $date = $item["date"];
            $price = $item["price"];


            if (!isset($resultComparativa[$name])) {
                $resultComparativa[$name] = [];
            }

            $resultComparativa[$name][] = [
                "date" => $date,
                "price" => $price
            ];
        }

        foreach ($resultComparativa as $name => $valor) {
            $cantidadElementos = count($valor);
            if ($cantidadElementos > $maxElementos) {
                $maxElementos = $cantidadElementos;
                $productoConMasElementos = $cantidadElementos;
            }
        }







        $totalGastos = [];
        $totalProductosRegistrados = 0;


        $compras = Compras::orderBy('created_at', 'DESC')->limit(5)->get();

        $detalles = ComprasDetalles::all();

        //         select count(d.product_id) as total, i.name from compras_detalles d
        // inner join inventarios as i on i._id = d.product_id
        // GROUP BY d.product_id
        // order by total DESC

        $masComprados = DB::select("select count(d.product_id) as total, sum(d.qty) as cantidad, i.name, sum(d.price) as gasto from compras_detalles d
                                    inner join inventarios as i on i._id = d.product_id 
                                    GROUP BY d.product_id, i.name
                                    order by total DESC
                                    LIMIT 5");

        // return $masComprados;
        $totalProductosRegistrados = Inventario::all()->count();
        return view('home', compact('totalProductosRegistrados', 'compras', 'masComprados', 'resultComparativa', 'productoConMasElementos'));
    }
}
