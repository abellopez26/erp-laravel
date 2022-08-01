@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-content-area br-4">
                <div class="widget-one" style="background-color: white">
                    <h4 class="text-center">Listado de Ventas </h4>

                    <div class="row my-4">
                        <div class="col">
                            <a href="{{ route('sales.create')}}" class="btn btn-primary mb-2">Agregar Venta</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Nombre del Cliente</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales as $sale)
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
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
