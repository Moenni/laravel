@extends('layouts.app')

@section('content')
<div class="container">
Formulario de edición de empleado
<form action="{{url('/empleado/' . $empleado->id)}}" method="post" enctype="multipart/form-data">
    {{method_field('PATCH')}}
    @include('empleado.form',['accion'=>'Editar'])
    </form>
</div>

@endsection
