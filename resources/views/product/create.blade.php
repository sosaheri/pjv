@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Productos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    @endif


                    <form  method="post" action="{{ route('product.store') }}" accept-charset="UTF-8">
                        @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input id="nombre" name="nombre" class="form-control" id="exampleFormControlInput1" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio</label>
                        <input id="precio" name="precio" class="form-control" id="exampleFormControlInput1" placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Impuesto</label>
                        <input id="impuesto" name="impuesto" class="form-control" id="exampleFormControlInput1" placeholder="Impuesto">
                    </div>        <button type="submit" class="btn btn-primary">Guardar</button>
              
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
