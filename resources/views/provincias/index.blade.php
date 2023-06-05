@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4> Provincias </h4></div>
                    <div class="card-body">
                        <a href="{{ url('/provincias/create') }}" class="btn btn-success btn-sm" title="Añadir Nuevo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir Provincia
                        </a>
                        <br/>
                        <br/>

                        <form method="GET" action="{{ url('/provincias') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        BUSCAR
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table  class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Acciones</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($provincias as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                       
                                        <td>
                                            <a href="{{ url('/provincias/' . $item->id_provincia . '/edit') }}" title="Editar Provincia"><button class="btn btn-primary btn-sm"> Editar</button></a>
                                            <form method="POST" action="{{ url('/provincias/' . $item->id_provincia.'/eliminar') }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm(&quot;Desea Eliminar?&quot;)"> Borrar</button>
                                            </form>
                                        </td>
                                        <td>{{ $item->descripcion_provincia }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$provincias->links()}}
                            
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
