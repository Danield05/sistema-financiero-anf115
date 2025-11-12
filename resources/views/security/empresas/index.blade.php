@extends('layouts.app')

@section('title')
Empresa
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Empresa</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-empresa')
                            <a class="btn btn-warning" href="{{ route('empresa.create')}}">Nuevo</a>
                            @endcan
                            
                            <table class="table table-striped-columns">
                                <thead>
                                    <th>Empresa</th>
                                    <th>Sector</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td> {{$empresa->nombre}} </td>
                                            <td> {{$empresa->sector->nombre}} </td>
                                            <td class="index-botones">
                                                @can('editar-empresa')
                                                <div>
                                                    <a class="btn btn-info" href="{{route('empresa.edit', $empresa->id)}}">Editar</a>
                                                </div>
                                                @endcan
                                                
                                                @can('borrar-empresa')
                                                {!! Form::open(['method'=>'DELETE', 'route' => ['empresa.destroy', $empresa->id]]) !!}
                                                {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $empresas->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection