@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Productos') }}</div>

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

                    @if ($message)
                        
                            <li class="text-primary">{{ $message }}</li>
                        
                    @endif                    


                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)

                            <tr>
                            <th scope="row"> {{ $product->id }} </th>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->precio }}</td>
                            <td> 

                                @if (Auth::user()->tipo_usuario)
                                <a href="{{ route('product.show', $product->id ) }}" class="btn btn-outline-primary" role="button">Editar</a>

                                <form style="display: inline !important;" action="{{ route('product.delete', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>

                                                                    
                                @else

                                <form style="display: inline !important;" action="{{ route('compra.store', $product->id)}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="btn btn-outline-primary" type="submit">Comprar</button>
                                </form>

                                
                            @endif </td>
                            </tr>                            
                                
                            @endforeach

                            


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
