@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $errors)
                    <li> {{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget widget-content-area br-4">
                    <div class="widget-one">
                        <h4 class="text-center">Nuevo Cliente </h4>
                        <form class="needs-validation mx-4" method="POST" novalidate action="{{ route('customers.store') }}">
                            @csrf
                            <div class="form-row mb-4">
                                <div class="col">
                                    <label for="formGroupExampleInput">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" value="{{ old('name')}}" required>
                                    <div class="invalid-feedback">
                                        Debes ingresar un nombre
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput">Apellido</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        placeholder="Lastname" value="{{ old('lastname')}}" required>
                                    <div class="invalid-feedback">
                                        Debes ingresar un apellido
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput">Direccion</label>
                                <textarea class="form-control" name="address" id="address" rows="5" placeholder="Address" required></textarea>
                                <div class="invalid-feedback">
                                    Debes ingresar una direccion
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput">Telefono</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                                    placeholder="Phone" value="{{ old('phonenumber')}}" required>
                                <div class="invalid-feedback">
                                    Debes ingresar un telefono
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-rounded mb-1">Guardar</button>
                                <a type="button" href="{{ route('customers.index') }}"
                                    class="btn btn-danger btn-rounded mb-1">Cancelar</a>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
