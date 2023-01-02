@extends('layouts.app')

@section('content')
<div class="container">



Mostrar lista de empleados:D
<br>
<br>
<a href="{{url('empleado/create')}}">Crear nuevo empleado</a>
<br>
@if(Session::has('mensaje'))
   {{Session::get('mensaje')}}
@endif

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>correo</th>
            <th>foto</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{$empleado->id }}</td>
            <td>{{$empleado->Nombre }}</td>
            <td>{{$empleado->Apellido }}</td>
            <td>{{$empleado->Correo }}</td>
            <td>
               <img src="{{asset('storage').'/'. $empleado->Foto }}" width="80px">
            </td>
            <td>
                <a href="{{url('/empleado/'.$empleado->id.'/edit')}}">
                Editar |
            </a>
                <form action="{{url('/empleado/'.$empleado->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" value="Borrar" onclick="return confirm('Quieres borrar el emplado?')">
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
