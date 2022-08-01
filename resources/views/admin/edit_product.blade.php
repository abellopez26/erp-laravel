@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-content-area br-4">
                <div class="widget-one">
                    <h4 class="text-center">Editar Producto</h4>

                    <form class="mx-4" method="POST"  action="{{ route('products.update', $product)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Nombre</label>
                            <input type="text" class="form-control"  id="name" name="name" placeholder="Name" value="{{$product->name}}" required>
                            <div class="invalid-feedback">
                                Debes ingresar un nombre
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Descripcion</label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description" required>{{$product->description}}</textarea>
                            <div class="invalid-feedback">
                                Debes ingresar una descripcion
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Precio</label>
                            <input type="number" class="form-control"  id="price" name="price" placeholder="Price" value="{{$product->price}}" required>
                            <div class="invalid-feedback">
                                Debes ingresar un precio
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Proveedor</label>
                            <select class="form-control  basic" name="provider_id">
                                <option selected="">Seleccione un Proveedor...</option>
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id}}">{{ $provider->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success btn-rounded mb-1">Actualizar</button>
                            <a type="button" href="{{ route('products.index')}}" class="btn btn-danger btn-rounded mb-1">Cancelar</a>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
