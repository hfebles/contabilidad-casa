@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('compras.store') }}" method='POST'>
                @csrf
                <input type="hidden" name="tipo" value="lista">
                <input type="hidden" name="id_lista" value="{{ $data[0]->_id }}">
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success btn-sm">Cargar como Compra</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered text-uppercase">
                                <thead>
                                    <tr class="text-center">
                                        <th width="66%">Nombre</th>
                                        <th width="10%">Cantidad</th>
                                        <th width="10%">Comprado</th>
                                        <th width="10%">Precio</th>
                                        <th width="3%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lista as $k => $v)
                                        <tr>
                                            <td>{{ $k }} </td>
                                            <td class="text-center">{{ $v['cantidad'] }}
                                            <td> <input class="form-control" type="text"
                                                    name="qty[{{ $v['product_id'] }}][]">
                                            </td>
                                            <td> <input class="form-control" type="text"
                                                    name="price[{{ $v['product_id'] }}][]">
                                            </td>
                                            <td class="text-center">
                                                <input name="check[{{ $v['product_id'] }}][]" value="true"
                                                    class="form-check-input" type="checkbox" id="flexCheckDefault">

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
