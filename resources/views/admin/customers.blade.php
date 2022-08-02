@extends('layouts.app')


@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>


    @if (Session::has('save'))
        <script type="text/javascript">
            swal({
                title: 'Registro guardado',
                text: "El cliente ha sido creado",
                type: 'success',
                padding: '2em'
            })
        </script>
    @endif

    @if (Session::has('update'))
        <script type="text/javascript">
            swal({
                title: 'Registro actualizado',
                text: "El cliente ha sido actualizado",
                type: 'success',
                padding: '2em'
            })
        </script>
    @endif

    @if (Session::has('delete'))
        <script type="text/javascript">
            swal({
                title: 'Registro eliminado',
                text: "El cliente ha sido eliminado",
                type: 'success',
                padding: '2em'
            })
        </script>
    @endif


    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget widget-content-area br-4">
                    <div class="widget-one">
                        <h4 class="text-center">Listado de Clientes </h4>

                        <div class="row my-4">
                            <div class="col">
                                <a href="{{ route('customers.create') }}" class="btn btn-primary mb-2">Agregar Cliente</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $customer)
                                        <tr>
                                            <td> {{ $customer->name }} </td>
                                            <td> {{ $customer->address }} </td>
                                            <td> {{ $customer->phonenumber }} </td>
                                            <td>
                                                <form method="POST" action="{{ route('customers.destroy', $customer) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('customers.edit', $customer) }}"
                                                        class="btn btn-outline-success btn-rounded mb-1">Editar</a>
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-rounded mb-1">Eliminar</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" style="text-align: center">No hay Registros</td>
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
