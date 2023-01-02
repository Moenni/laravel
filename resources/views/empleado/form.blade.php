
<div class="container">
@csrf
<br>
<label for="Nombre">Nombre:</label>
<input type="text" name="Nombre" id="Nombre" value="{{isset( $empleado->Nombre)?$empleado->Nombre:'' }}" >
<br>
<br>
<label for="Apellido">Apellido:</label>
<input type="text" name="Apellido" id="Apellido" value="{{ isset($empleado->Apellido)?$empleado->Apellido:'' }}" >
<br>
<br>
<label for="Correo">Correo:</label>
<input type="email" name="Correo" id="Correo"  value="{{isset($empleado->Correo)?$empleado->Correo:'' }}">
<br>
<br>
@if(isset($empleado->Foto))
    <img src="{{asset('storage').'/'. $empleado->Foto }}" width="80px">
@endif
<br>
<label for="Foto">Foto:</label>
<input type="file" name="Foto" id="Foto" >
<br>
<br>
<input type="submit" value="{{$accion}} empleado">
<br>
<br>
<a href="{{url('empleado')}}">Volver al inicio</a>


