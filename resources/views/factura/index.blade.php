@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                 
            <div class="card">
                <div class="card-header">

                                <form style="display: inline !important;" action="{{ route('facturar')}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="text-right btn btn-outline-primary" type="submit">Generar Facturas Pendientes</button>
                                </form>               

                </div>


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
                            <th scope="col">Factura #</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Monto</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($facts as $item)

                            <tr>
                            <th scope="row">{{  $item->id}}  </th>
                            <td>{{  $item->user->name }}</td>
                            <td>{{  $item->total_factura }}</td>
                            <td> 

                                <a href="{{ route('factura.show', $item->id ) }}" class="btn btn-outline-primary" role="button">Detalles</a>
                                
                             </td>
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
