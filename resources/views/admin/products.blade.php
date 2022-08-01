@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-content-area br-4">
                <div class="widget-one">
                    <h4 class="text-center">Listado de Productos </h4>

                    <div class="row my-4">
                        <div class="col">
                            <a href="{{ route ('products.create')}}" class="btn btn-primary mb-2">Agregar Producto</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Nombre del Proveedor</th>
                                    <th> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td> {{$product->name}} </td>
                                    <td> {{$product->description}} </td>
                                    <td> {{$product->price}} </td>
                                    <td> {{$product->provider->name}} </td>
                                    <td>
                                        <form method="POST" action="{{ route('products.destroy', $product)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('products.edit', $product)}}" class="btn btn-outline-success btn-rounded mb-1">Editar</a>
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
