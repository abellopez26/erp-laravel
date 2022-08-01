@extends('layouts.app')

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget widget-content-area br-4">
                    <div class="widget-one">
                        <h4 class="text-center">Nueva Venta </h4>
                        <form class="needs-validation mx-4" method="POST" novalidate action="{{ route('customers.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput">Cliente</label>
                                <select class="form-control  basic" name="customer_id">
                                    <option selected="selected">Seleccione un Cliente...</option>
                                    @foreach ($customers as $customer)

                                    <option value="{{$customer->id}}"> {{$customer->name . " " . $customer->lastname}}</option>

                                    @endforeach

                                </select>
                            </div>

                            <hr>
                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput">Producto</label>
                                <select class="form-control  basic" name="product_id">
                                    <option selected="selected">Seleccione un Producto...</option>
                                    @foreach ($products as $product)

                                    <option value="{{$product->id}}"> {{$product->name}}</option>

                                    @endforeach

                                </select>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col">
                                    <label for="formGroupExampleInput">Cantidad</label>
                                    <input type="text" name="cantity" id="cantity" class="form-control"
                                        placeholder="0" required>
                                    <div class="invalid-feedback">
                                        Debes ingresar una cantidad
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput">Precio</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        placeholder="$0.00" disabled required>

                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput">Total</label>
                                    <input type="text" class="form-control" id="total" name="total"
                                        placeholder="$0.00" disabled required>

                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary btn-rounded mb-1">Agregar Producto</button>
                                <a type="button" href="{{ route('sales.index') }}"
                                    class="btn btn-danger btn-rounded mb-1">Cancelar</a>
                            </div>


                        </form>

                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th>Nombre del Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse ($sales as $sale)
                                <tr>
                                    <td> {{$sale->customer->name}} </td>
                                    <td> {{$sale->date}} </td>
                                    <td> {{$sale->total}} </td>
                                    <td> {{$sale->status}} </td>
                                    <td>
                                        <form method="POST" action="{{ route('sales.destroy', $sale)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('sales.edit', $sale)}}" class="btn btn-outline-success btn-rounded mb-1">Editar</a>
                                            <button type="submit" class="btn btn-outline-danger btn-rounded mb-1">Eliminar</button>
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center" >No hay Registros</td>
                                    </tr>
                                @endforelse
                            </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
