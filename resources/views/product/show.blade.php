@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Productos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="post" action="{{ route('product.update') }}" accept-charset="UTF-8">
                        @csrf
                        
                        <input type="hidden" name="id"  value="{{ $product->id }}" >

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input id="nombre" name="nombre" class="form-control" value="{{ $product->nombre }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio</label>
                        <input id="precio" name="precio" class="form-control"  value="{{$product->precio}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Impuesto</label>
                        <input id="impuesto" name="impuesto" class="form-control"  value="{{$product->impuesto}}">
                    </div>        <button type="submit" class="btn btn-primary">Actualizar</button>
              
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
