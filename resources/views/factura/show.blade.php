@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Factura #') }}{{ $factura->id}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cliente:  {{ $factura->user->name }}</label>
                        
                    </div>
<hr>
                    @php
                        $var =json_decode($factura->detallado,true);

                        for ($i=0; $i < count($var) ; $i++) { 
                    @endphp
                                        <ul>
                                            <li><label for="exampleFormControlInput1"> {{ $var[$i][0] }} --- Precio {{ $var[$i][1] }} --- Impuesto {{ $var[$i][2] }}</label></li>
                                        </ul>
                    @php
                        }
                    
                    @endphp

<hr>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Impuesto cobrado:  {{ $factura->total_impuesto }} </label>
                        
                    </div>   
                    
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Total :  {{ $factura->total_factura }}</label>
                        
                    </div>




      
              
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
