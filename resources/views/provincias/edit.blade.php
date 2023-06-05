@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <div>
            <h1 class="page-title">Editar Provincia</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/provincias">Listado</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if(session()->get('success'))
                <div class="alert alert-success">
                    <h4 class="alert-heading">{{ session()->get('success') }}</h4>
                </div>
                @endif
                
                <div class="card-body">  
                    <a href="{{ url('/provincias') }}" title="Volver"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Volver</button></a>
                        <br />
                        <br />                          
                    <form method="POST" action="{{ url('/provincias/' . $provincia->id_provincia) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="row mb-4">
                            <label for="nombre" class="col-form-label col-lg-2">Nombre:</label>
                            <div class="col-lg-10">
                                    <dropdown-component  descripcion_provincia="{{$provincia->descripcion_provincia}}" ></dropdown-component>
                            </div>                        
                        </div>
                                   
                        <div class="row justify-content-end">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </form>
                        
                </div>
            </div>
        </div>
    </div>  
</div>  
@endsection