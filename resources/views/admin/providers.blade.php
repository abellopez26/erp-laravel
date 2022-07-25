@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-content-area br-4">
                <div class="widget-one">
                    <h4 class="text-center">Listado de Proveedores </h4>

                    <div class="row my-4">
                        <div class="col">
                            <a href="{{ route('providers.create')}}" class="btn btn-primary mb-2">Agregar Proveedor</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($providers as $provider)
                                <tr>
                                    <td> {{$provider->name}} </td>
                                    <td> {{$provider->email}} </td>
                                    <td> {{$provider->address}} </td>
                                    <td> {{$provider->phonenumber}} </td>
                                    <td>
                                        <form method="POST" action="{{ route('providers.destroy', $provider)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('providers.edit', $provider)}}" class="btn btn-outline-success btn-rounded mb-1">Editar</a>
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
