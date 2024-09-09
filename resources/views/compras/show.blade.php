@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-sm table-bordered text-uppercase text-center">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>{{ date('d/m/Y', strtotime($dataCompra->date)) }}</td>
                                    <td>{{ number_format($dataCompra->total, 2, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-sm table-bordered text-uppercase">
                            <thead>
                                <tr class="text-center">
                                    <th width="2%">#</th>
                                    <th width="51%">Descripcion</th>
                                    <th width="17%">Categoria</th>
                                    <th width="7%">UND</th>
                                    <th width="7%">CANT</th>
                                    <th width="7%">Precio</th>
                                    <th width="7%">total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataDetalle as $k2 => $d2)
                                    <tr>
                                        <td class="text-center">{{ ++$k2 }} </td>
                                        <td>
                                            {{ $d2->name }}
                                            - {{ $d2->presentation }}
                                            @if ($d2->presentation)
                                                {{ $d2->unit_name }}
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $d2->category_name }}</td>
                                        <td class="text-center">{{ $d2->unit_name }}</td>
                                        <td class="text-end">{{ number_format($d2->qty, 3, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($d2->price, 2, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($d2->sub, 2, ',', '.') }}</td>
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
