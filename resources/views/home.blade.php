@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <div class="card bg-success text-white">
                    <div class="card-header text-center">
                        Productos Registrados
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <span class="h1 ps-4">{{ $totalProductosRegistrados }} </span>
                        <span class="fs-1"><i class="ri-restaurant-line"></i></span>
                    </div>
                    <div class="card-footer d-flex justify-content-end align-middle">
                        <a class="text-white" href="{{ route('inventario.index') }}">
                            Ver productos <i class="ri-arrow-right-circle-line"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-2">
                <div class="card bg-info text-white">
                    <div class="card-header text-center">
                        Crear Lista de compra
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <span class="h1 ps-4">Lista</span>
                        <span class="fs-1"><i class="ri-shopping-cart-line"></i></span>
                    </div>
                    <div class="card-footer d-flex justify-content-end align-middle">
                        <a class="text-white" href="{{ route('lista.create') }}">
                            Ir <i class="ri-arrow-right-circle-line"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-6 col-xs-12 my-3">
                <div class="card ">
                    <div class="card-header text-center">
                        Historico de compras
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $k => $d)
                                    <tr>
                                        <td>{{ $d->_id }} </td>
                                        <td>{{ date('d/m/Y', strtotime($d->date)) }}</td>
                                        <td>{{ $d->total }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end align-middle">
                        <a class="" href="{{ route('inventario.index') }}">
                            Ver productos <i class="ri-arrow-right-circle-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 my-3">
                <div class="card ">
                    <div class="card-header text-center">
                        Mas comprados
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Cantidad de Compras</th>
                                    <th>Total de items</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masComprados as $k => $d)
                                    <tr>
                                        <td>{{ ++$k }} </td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->total }}</td>
                                        <td>{{ $d->cantidad }}</td>
                                        <td>{{ $d->gasto }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end align-middle">
                        <a class="" href="{{ route('inventario.index') }}">
                            Ver productos <i class="ri-arrow-right-circle-line"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 my-3">
                <div class="card ">
                    <div class="card-header text-center">
                        comparativa
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <table class="table table-sm table-bordered">
                            {{-- <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>fecha</th>
                                    <th>precio</th>
                                </tr>
                            </thead> --}}
                            <tbody>
                                @foreach ($resultComparativa as $nombreProducto => $productos)
                                    <tr>
                                        <td class="text-center" colspan="{{ $productoConMasElementos * 2 }}">
                                            {{ $nombreProducto }} </td>
                                    </tr>
                                    <tr>
                                        @foreach ($productos as $producto)
                                            <th>fecha</th>
                                            <th>precio</th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($productos as $producto)
                                            <td>{{ $producto['date'] }}</td>
                                            <td>{{ $producto['price'] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-md-12">

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum aspernatur quam rerum, error
                reprehenderit repudiandae necessitatibus ad quibusdam consectetur, deleniti iure temporibus
                cupiditate quos dolorum impedit debitis fugit soluta facere!

            </div>
        </div>
    </div>
@endsection
