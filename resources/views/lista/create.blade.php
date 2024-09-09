@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('lista.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                </div>
                            </div>
                            <table id="myTable" class="table table-sm table-bordered text-uppercase">
                                <tr>
                                    <th width="20%">Producto</th>
                                    <th width="20%">Cantidad</th>
                                </tr>
                                @foreach ($inv as $producto)
                                    <tr class="align-middle">
                                        <td>
                                            <div class="form-check">
                                                <input name="lista[{{ $producto->_id }}][producto]"
                                                    value="{{ $producto->name }}" class="form-check-input" type="checkbox"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $producto->name }}
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <input placeholder="ingrese la cantidad" type="text"
                                                class="form-control text-uppercase" name="lista[{{ $producto->_id }}][qty]">
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
