@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-content-area br-4">
                <div class="widget-one">
                    <h4 class="text-center">Editar Proveedor</h4>

                    <form class="mx-4" method="POST"  action="{{ route('providers.update', $provider)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Nombre Completo</label>
                            <input type="text" class="form-control"  id="name" name="name" placeholder="Name" value="{{$provider->name}}" required>
                            <div class="invalid-feedback">
                                Debes ingresar un nombre
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Correo</label>
                            <input type="email" class="form-control"  id="email" name="email" placeholder="Email" value="{{$provider->email}}" required>
                            <div class="invalid-feedback">
                                Debes ingresar un correo
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Direccion</label>
                            <textarea class="form-control" name="address" id="address" rows="5" placeholder="Address" required>{{$provider->address}}</textarea>
                            <div class="invalid-feedback">
                                Debes ingresar una direccion
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Telefono</label>
                            <input type="text" class="form-control"  id="phonenumber" name="phonenumber" placeholder="Phone Number" value="{{$provider->phonenumber}}" required>
                            <div class="invalid-feedback">
                                Debes ingresar un telefono
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success btn-rounded mb-1">Actualizar</button>
                            <a type="button" href="{{ route('providers.index')}}" class="btn btn-danger btn-rounded mb-1">Cancelar</a>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
