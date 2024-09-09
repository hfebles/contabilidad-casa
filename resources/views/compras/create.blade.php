@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('compras.store') }}">
                            @csrf
                            <input type="hidden" name="tipo" value="compra">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="">Fecha</label>
                                    <input class="form-control from-control-sm" type="date" name='date'>
                                </div>
                            </div>
                            <table id="myTable" class="table table-sm table-bordered">
                                <tr>
                                    <th width="2%">
                                        <button type="button" onclick="addRow();" class="btn btn-success btn-sm"><i
                                                class="ri-add-circle-fill"></i></button>
                                    </th>
                                    <th width="50%">descripcion</th>
                                    <th width="10%">cantidad</th>
                                    <th width="10%">precio</th>
                                    <th width="10%">total</th>
                                    <th width="2%">Borrar</th>
                                </tr>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var i = 0;

        function addRow() {
            var table = document.getElementById("myTable");
            var row = table.insertRow(-1);
            row.id = 'tr_' + i

            datos = @json($inv)

            console.table(datos)

            var cell2 = row.insertCell(-1);
            var cell3 = row.insertCell(-1);
            var cell4 = row.insertCell(-1);
            var cell5 = row.insertCell(-1);
            var cell6 = row.insertCell(-1);
            var cell7 = row.insertCell(-1);


            cell2.innerHTML = '';
            // cell2.innerHTML = '<a id="search_productos_' + i + '" onclick="abreModal(\'producto\', ' + i +
            //     ')" class="btn btn-info btn-block mb-0 btn-sm"><i class="ri-search-line"></i></a>';
            // //cell2.id = "td_"+i
            // cell2.className = "align-middle bg-info"
            // cell2.width = "2%"

            // cell3.innerHTML = "<p class='align-middle mb-0' id='name_product" + i + "'></p>";

            var selectProductos =
                '<select name="product_id[]" class="form-select form-select-sm"><option>Seleccione</option>';
            for (let index = 0; index < datos.length; index++) {
                selectProductos +=
                    `<option value="${datos[index]._id}"> ${datos[index].name} ${datos[index].presentation} ${datos[index].unit_name} </option>`
            }
            selectProductos += ' </select>'
            cell3.innerHTML = selectProductos
            cell3.id = "td_" + i
            cell3.className = "align-middle"


            cell4.innerHTML = `<input class='form-control form-control-sm' name='qty[]' id='qty_${i}' type='text' />`;
            cell4.className = "text-center align-middle"

            cell5.innerHTML =
                `<input onkeyup="calculo(${i})" class='form-control form-control-sm' name='price[]' id='price_${i}' type='text' />`;
            cell5.className = "text-center align-middle"

            cell6.innerHTML =
                `<input class='form-control form-control-sm' disabled  id='total_${i}' name='total[]' type='text' /><input type="hidden"  id='sub_${i}' name='total[]'>`;
            cell6.className = "text-center align-middle"
            cell6.id = "tds_" + i

            cell7.innerHTML =
                '<a onclick="borrarRow(this)" class="btn btn-block btn-sm btn-danger mb-0"><i class="ri-subtract-line"></i></a>';
            cell7.className = "text-center align-middle bg-danger"

            i++


        }


        function calculo(indice) {

            var precio = document.querySelector(`#price_${indice}`).value;
            var qty = document.querySelector(`#qty_${indice}`).value;

            var total_txt = document.querySelector(`#total_${indice}`);
            var sub = document.querySelector(`#sub_${indice}`);

            var calculo = precio * qty;

            total_txt.value = calculo.toFixed(2)
            sub.value = calculo.toFixed(2)

        }


        function borrarRow(x) {

            var i = x.parentNode.parentNode.rowIndex;
            document.getElementById("myTable").deleteRow(i);
            // var suma = 0
            // var sumaNo = 0
            // var total = 0
            // var exe = document.getElementsByName('subtotal_exento[]')
            // var noExe = document.getElementsByName('subtotal[]')
            // for (let e = 0; e < exe.length; e++) {
            //     valor = exe[e].value || 0
            //     suma += parseFloat(valor)
            // }
            // for (let e = 0; e < noExe.length; e++) {
            //     valor = noExe[e].value || 0
            //     sumaNo += parseFloat(valor)
            // }
            // document.getElementById('subFacs').innerHTML = 'Bs. ' + sumaNo.toFixed(2)
            // document.getElementById('exentos').innerHTML = 'Bs. ' + suma.toFixed(2)
            // document.getElementById('subFac').value = sumaNo.toFixed(2)
            // document.getElementById('exento').value = suma.toFixed(2)
            // if (document.getElementById('taxt_16').checked == true) {
            //     calculateTaxes(16)
            // }
        }
    </script>
@endsection
