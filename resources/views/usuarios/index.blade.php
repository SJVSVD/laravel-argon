@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row">
                    <div class="col-10">
                        <div class="card-header pb-0">
                            <h6>Usuarios</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-header pb-0">
                            <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Rol</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/team-1.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $usuario->username}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $usuario->email}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if(!empty($usuario->getRoleNames()))
                                            @foreach($usuario->getRoleNames() as $rolName)
                                                <p class="text-sm font-weight-bold mb-0">{{$rolName}}</p>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <form action="{{ route('usuarios.destroy', $usuario->id)}}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quieres eliminar a este usuario?')"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {!! $usuarios->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
