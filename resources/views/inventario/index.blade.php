@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventarios as $k => $inventario)
                                    <tr>
                                        <td>{{ ++$k }} </td>
                                        <td>{{ $inventario->name }} {{ $inventario->presentation }}
                                            {{ $inventario->unit_name }}</td>
                                        <td>{{ $inventario->category_name }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
