@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('inventario.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Nombre del producto</label>
                                    <input class="form-control form-control-sm" type="text" name="name"
                                        id="name">
                                </div>
                                <div class="col-6">
                                    <label for="catgory">Categoria</label>
                                    <select class="form-select form-select-sm" name="category_id" id="category_id">
                                        <option value="">Seleccione</option>
                                        @foreach ($categorias as $k => $category)
                                            <option value="{{ $k }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="unit">Unidad</label>
                                    <select class="form-select form-select-sm" name="unit" id="unit">
                                        <option value="">Seleccione</option>
                                        @foreach ($unidades as $k => $category)
                                            <option value="{{ $k }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="presentation">Presentacion</label>
                                    <input class="form-control form-control-sm" type="text" name="presentation"
                                        id="presentation">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
