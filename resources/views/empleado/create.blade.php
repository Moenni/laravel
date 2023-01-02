Formulario de creacion de empleado
<form action="{{url('empleado')}}" method="post" enctype="multipart/form-data">
<br>
<label for="Nombre">Nombre:</label>   
<input type="text" name="Nombre" id="Nombre">
<br>
<br>
<label for="Apellido">Apellido:</label>  
<input type="text" name="Apellido" id="Apellido">
<br>
<br>
<label for="Correo">Correo:</label>  
<input type="email" name="Correo" id="Correo">
<br>
<br>
<label for="Foto">Foto:</label>  
<input type="file" name="Foto" id="Foto"> 
<br>
<br>
<input type="submit" value="Enviar">
</form>