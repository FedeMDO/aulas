<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Manual de usuario';


?>

   


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.accordion {
    background-color:#2980B9;
    color: #FDFEFE;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #2980B9;
}

.accordion:after {
    content: '\002B';
    color: #1E90FF;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2212";
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>
</head>
<body>

<h2>Manual de usuario</h2>
<br>
<button class="accordion">Entrada al sistema (Login)</button>
<div class="panel">
<p>Para acceder a la aplicación, el usuario debe de hacer uso de sus credenciales de acceso (usuario o Email y contraseña).</p>
<p> <b>Acceso a la aplicación:</b> </p>
<p>El acceso se otorgara dirigiendose al el siguiente enlace: http://yii.local/site/login</p>


<img width="900px" height="400" src="../image/manual/pastedmage0.png" />

 <br>

<br>
<p><b>Botones disponibles:</b></p>
<p><b> Ingresar:</b> Una vez ingresado su usuario y contraseña, pulsa este botón para ingresar al sistema. Si todo sale correctamente, aparecerá en el inicio: </p>

<img width="900px" height="400" src="../image/manual/inicio.png" />
<br>
<br>

<p><b>¿Olvidaste tu contraseña? :</b> Si no recuerda su contraseña, puede pulsar este botón. Le aparecerá la siguiente vista, donde usted debe ingresar su Email.
Se le enviará un enlace a la dirección de Email que usted ingresó y así podrá restablecer su contraseña. </p>

<img width="456px" height="348" src="../image/manual/rec.png" />

</div>

<button class="accordion">Sedes</button>
<div class="panel">
<br>
<p>Para acceder a el módulo de sedes, se debe ingresar previamente al sistema.<p>.
<b><p>Acceso a Sedes:</b></p>
<p>Para acceder a la aplicación se utilizará el siguiente enlace:</p>
<p>http://yii.local/sede/vistav </p>
<img width="1000px" height="300" src="../image/manual/vistasedes.png" />
<br>
<br>
<p>En esta vista, nos aparecerá las sedes de la universidad.</p>
<br>
<b><h3>Creación de sedes</h3></b>
<br>

<p>Para la creación de sedes presionaremos el botón de la esquina superior izquierda:<p>
<img width="911px" height="490" src="../image/manual/createsedes.png" />
<br>

<p>Se desplegará el siguiente menú de opciones y seleccionaremos <b>“Creación de sedes”:</b></p>
<img width="200px" height="378" src="../image/manual/menu.png" />
<br><br>
<p>Nos saldra el siguiente formulario:</b>:</p>
<img width="500px" height="500" src="../image/manual/crearsede.png" />
<br><br>
<p>Campos a rellenar:<p>

<p><b>Nombre de sede:</b>&nbsp; Se deberá poner el nombre de la sede que quiera crear.</p>

<p><b>Calle:</b>&nbsp;Se deberá poner la calle donde está ubicada la sede.</p>

<p><b>Localidad:</b>&nbsp;Localidad donde pertenece la sede.</p>

<p><b>Disponible desde:</b>&nbsp;Aquí debe poner desde cuando esta disponible la sede.</p>

<p><b>Disponible hasta:</b>&nbsp;Aquí debe poner desde cuando hasta cuando estara disponible la sede.</p>
<br>
<p><b>Botones disponibles:</b></p>

<p><b>Crear:</b>&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos. </p>

<br>
<b><h3>Creación de comisiones</h3></b>
<br>

<p>Para la creación de comisiones presionaremos el botón de la esquina superior izquierda:<p>
<img width="911px" height="490" src="../image/manual/createsedes.png" />
<br>

<p>Se desplegará el siguiente menú de opciones y seleccionaremos <b>“Creación de comisiones”:</b></p>
<img width="200px" height="378" src="../image/manual/menu.png" />
<br><br>
<p>Nos saldra el siguiente formulario:</b></p>
<img width="500px" height="500" src="../image/manual/crearcomi.png" />
<br><br>
<p>Campos a rellenar:<p>

<p><b>Número:</b>&nbsp; Debe poner el numero de comisión.</p>

<p><b>Instituto:</b>&nbsp;Seleccionará el instituto a la que estará asignada la comisión (Ingeniería, Sociales, Salud)</p>

<p><b>Carrera:</b>&nbsp;Selecciona la carrera a la que estará asignada la comisión</p>

<p><b>Carga Horaria Semanal:</b>&nbsp;Debe poner la carga horaria semanal que tendrá la comisión que desea crear.</p>

<br>
<p><b>Botones disponibles:</b></p>

<p><b>Crear:</b>&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos. </p>


<b><h3>Creación de materias</h3></b>
<br>

<p>Para la creación de materias presionaremos el botón de la esquina superior izquierda:<p>
<img width="911px" height="490" src="../image/manual/createsedes.png" />
<br>

<p>Se desplegará el siguiente menú de opciones y seleccionaremos <b>“Crear materia”:</b></p>
<img width="200px" height="378" src="../image/manual/menu.png" />
<br><br>
<p>Nos saldra el siguiente formulario:</b></p>
<img width="485px" height="428" src="../image/manual/crearmat.png" />
<br><br>
<p>Campos a rellenar:<p>

<p><b>Nombre:</b>&nbsp; Nombre de la materia.</p>

<p><b>Descripción corta:</b>&nbsp;Se deberá indicar una descripción corta de la materia.</p>

<p><b>Codigo de materia:</b>&nbsp;Se deberá ingresar código que tendrá asignado la materia.</p>

<br>
<p><b>Botones disponibles:</b></p>

<p><b>Crear:</b>&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos</p>


<b><h3>Filtración de aulas</h3></b>
<br>

<p>Para ingresar al filtro de aulas presionaremos el botón de la esquina superior izquierda:<p>
<img width="911px" height="490" src="../image/manual/createsedes.png" />
<br>

<p>Se desplegará el siguiente menú de opciones y seleccionaremos <b>“Filtrar aulas”:</b></p>
<img width="200px" height="378" src="../image/manual/menu.png" />
<br><br>
<p>Nos saldra el siguiente formulario:</b></p>
<img width="469px" height="508" src="../image/manual/filtrau.png" />
<br><br>
<p>Campos a rellenar:<p>

<p><b>Nombre de sede:</b>&nbsp; En este campo se ingresará la sede en la cual se encuentra el aula.</p>

<p><b>Nombre de edificio:</b>&nbsp;El edificio donde se encuentra el aula.</p>

<p><b>Nombre de recurso:</b>&nbsp;En el caso que el aula tenga algún recurso asignado, deberá ponerlo.</p>

<p><b>Piso:</b>&nbsp;Piso donde se encuentra el aula.</p>

<p><b>Capacidad Mínima:</b>&nbsp;Seleccione la capacidad que tiene el aula que desea buscar.</p>

<br>
<p><b>Botones disponibles:</b></p>

<p><b>Buscar:</b>&nbsp; Una vez rellenado los campos deberá seleccionar este botón para buscar el aula. </p>


<b><h3>Modificacion de sedes</h3></b>
<br>

<p>Si usted desea modificar las sedes disponibles. Deberá ir a la opción “Modificar”:<p>
<img width="433x" height="420" src="../image/manual/modificar.png" />
<br>

<p>Una vez seleccionado el botón modificar nos dirigirá a el siguiente formulario:</p>
<img width="494px" height="534" src="../image/manual/actualizarSede.png" />
<br><br>
<p>Campos a rellenar:<p>

<p><b>Nombre de sede:</b>&nbsp; Se deberá poner el nombre de la sede que quiera crear.</p>

<p><b>Calle:</b>&nbsp;Se deberá poner la calle donde está ubicada la sede.</p>

<p><b>Localidad:</b>&nbsp;Localidad donde pertenece la sede.</p>

<p><b>Disponible desde:</b>&nbsp;Aquí debe poner desde cuando esta disponible la sede.</p>

<p><b>Disponible hasta:</b>&nbsp;Aquí debe poner desde cuando hasta cuando estara disponible la sede.</p>

<br>
<p><b>Botones disponibles:</b></p>

<p><b>Actualizar:</b>&nbsp;Una vez rellenado los campos deberá seleccionar este botón para actualizar los datos de la sede.</p>




</div>

<button class="accordion">Edificios</button>
<div class="panel">
<br>

<p>Para acceder a "Edificios", se debe ingresar previamente al sistema.<p>.
<b><p>Acceso a "Edificios":</b></p>
<br>
<p>Deberá ir a sedes, como lo indica la flecha azul:</p>
<br>
<img width="1337px" height="682" src="../image/manual/edin.png" />
<br>
<
<p><b>Botones disponibles:</b></p>
<p><b>Entrar:</b>&nbsp; Una vez entrada a las sedes estas aparecerán con este botón con el cual se podrá ingresar y ver la lista de edificios. </p>
<br>
<img width="1097px" height="523" src="../image/manual/edificios.png" />
<br>
<br>

<b><h3>Creación de edificios</h3></b>
<br>

<p>Para la creación de edificios usted deberá ir donde indica la flecha:<p>
<img width="1048x" height="590" src="../image/manual/creacionedi02.png" />
<br>

<p>Una vez seleccionado el botón, se desplegara el siguiente menu donde seleccionaremos "<b>Crear edificio</b>"</p>
<img width="199px" height="243" src="../image/manual/menuedi.png" />
<br><br>

<p>Nos saldra el siguiente formulario:</b></p>
<img width="504px" height="417" src="../image/manual/crearEdi.png" />
<br><br>
<p>Campos a rellenar:<p>

<p><b>Sede:</b>&nbsp;Se deberá seleccionar la sede a la cual queremos asignarle el edificio.</p>

<p><b>Nombre Edificio:</b>&nbsp; Se deberá escribir el nombre del edificio.</p>

<p><b>Cantidad Aulas:</b>&nbsp; Seleccione la cantidad de aulas que tendrá el edificio.</p>

<br>
<p><b>Botones disponibles:</b></p>

<p><b>Guardar:</b>&nbsp; Una vez rellenado los campos deberá presionar este botón para guardar los datos</p>

 

</div>



<button class="accordion">Aulas</button>
<div class="panel">
<br>

<p>Para acceder a "Aulas", se debe ingresar previamente al sistema.<p>.
<b><p>Acceso a "Aulas":</b></p>
<br>
<p>Deberá ir a sedes, como lo indica la flecha negra:</p>
<br>
<img width="512px" height="34" src="../image/manual/panelaula.png" />
<br>
<br>
<p>Una vez dentro de la vista de sedes debera presionar el botón entrar:</p>
<img width="1343px" height="586" src="../image/manual/aula02.png" />
<br><br>
<p>Para la creación de edificios usted deberá ir donde indica la flecha:</p>
<img width="1266px" height="611" src="../image/manual/aulas.png" />
<br><br>
<p>Se desplegará el siguiente menú de opciones y seleccionaremos “Crear aulas”<p>
<img width="176px" height="336" src="../image/manual/menuCrearAula.png" />
<br><br>
<p>Se nos abrira el siguiente formulario:<p>
<img width="449px" height="466" src="../image/manual/CrearAula.png" />

<p>Campos a rellenar:<p>

<p><b>Aula:</b>&nbsp; Ingrese el nombre del aula.</p>
<p><b>Edificio:</b>&nbsp; Seleccione el edificio al que le quiera asignar el aula.</p>
<p><b>Piso:</b>&nbsp; Ingrese el piso donde estará ubicada el aula.</p>
<p><b>Capacidad:</b>&nbsp; Ingrese el piso donde estará ubicada el aula.</p>
<br>
<p><b>Botones disponibles:</b></p>
<p><b>Guardar:</b>&nbsp; Una vez rellenado los campos deberá presionar este botón para guardar los datos</p>
<br>
</div>

<button class="accordion">Institutos</button>
<div class="panel">
<br>
<p>Para acceder a institutos, se debe ingresar previamente al sistema.</p>
<b><p>Ingresar a institutos</b><p>
<p>Deberá ir a institutos, como lo indica la flecha negra:</p>
<img width="1018px" height="444" src="../image/manual/institutos.png" />
<br><br>
<p>En la siguiente imagen se podra apreciar los usuarios pertenecientes a cada instituto que seleccionemos:</p>
<img width="419px" height="496" src="../image/manual/instiExpand.png" />
</div>

<button class="accordion">Carreras</button>
<div class="panel">
<br>
<p>Para acceder a Carreras se debe ingresar previamente al sistema.</p>
<b><p>Ingresar a Carreras</b><p>
<p>Seleccionaremos donde donde indica la flecha para ingresar a carreras:</p>
<img width="1100px" height="539" src="../image/manual/carrerasind.png" />
<br><br>

<p>Como se aprecia en la imagen, aparecerá las materias pertenecientes a cada carrera que seleccionemos:</p>
<img width="434px" height="571" src="../image/manual/infcarreras.png" />
<br><br>
</div>


<button class="accordion">Administracion</button>
<div class="panel">
<br>
<p><b>Ingresar a la administración</p></b>
<p>Debe ir donde indica la flecha:</p>
<img width="1338px" height="146" src="../image/manual/adm.png" />
<br><br>
<p>Nos aparecera tres modulos en administración: Registro de usuario, Panel de administración y Gestionar Usuarios:</p>
<img width="243px" height="160" src="../image/manual/menuAdmin.png" />
<br><br>
<b><h3>Registro de usuario</h3></b>
<br>
<p>Para acceder al registro de usuarios, se debe ser Admin, ya que es el único capaz de generar usuarios para el sistema. 
Accederemos al registro a través del siguiente el siguiente enlace:
http://yii.local/site/register </p>
<img width="514px" height="500" src="../image/manual/reg.png" />
<br>
<br>
<p><b>Campos:</p></b>
<p><b>Nombre de usuario:</b> &nbsp;Se debe escoger el nombre que se le asignará al usuario que desea registrar al sistema.</p>
<p><b>Email:</b> &nbsp;Se debe escribir el Email del usuario al que se desea registrar al sistema.</p>
<p><b>Instituto:</b>&nbsp;Se debe seleccionar a qué instituto pertenece el usuario. Los institutos disponibles son: Ingeniería, Sociales y Salud.<p>
<p><b>Permisos de usuario:</b>&nbsp;Aquí deberá seleccionar los permisos que tendrá el usuario. Existen tres  tipos de permisos, que son los siguientes:
<b><p>-Administrador</b></p>
<b><p>-Usuario</b></p>
<b><p>-Guest</p></b>
<p><b>Contraseña:</b> &nbsp;Se deberá ingresar la contraseña que le asignaremos al el usuario, con un mínimo de 6 y máximo de 16 caracteres.</p>
<br>
<p><b>Botones disponibles:</b></p>

<p><b>Finalizar registro:</b> &nbsp;Si usted relleno los campos, deberá apretar este botón para finalizar el registro. Le aparecerá la siguiente imagen:</p>

<img width="300px" height="189" src="../image/manual/alertreg.png" />
<br>
<br>
<p>Deberá ingresar a el Email del usuario que se registro al sistema, para confirmar su registro.<p>
<br>
<b><h3>Panel de administración</h3></b>

<p>En panel de administración usted podrá ver en el inicio algunas estadísticas generales como: el número de usuarios
 registrados, de carreras, de materias y institutos. Además en la columna izquierda podrá entrar a los paneles de: 
 aulas, carreras, comisiones, edificios, institutos, materias, notificaciones, recursos y de sedes..</p>
 <img width="971px" height="385" src="../image/manual/estadistAdmin.png" />
 <br><br>
 <p><b>Paneles</p></b>
 <br>
 <p><b>Panel de aula</p></b>
 <img width="1327px" height="607" src="../image/manual/panelDeAula.png" />
 <br><br>
 <p>En el panel de aulas veremos la lista de todas las aulas que se crearon. Adicionalmente, dispondremos de la opción de “Crear aula”.</p>
 <br>
 <p><b>Panel de carrera</p></b>
 <img width="1157px" height="510" src="../image/manual/panelCarrera.png" />
 <br><br>
 <p>En el panel de carreras veremos la lista de todas las carreras que se crearon. Adicionalmente, dispondremos de la opción de “Crear carrera”.</p>
<br>
 <p><b>Panel de comisiones</p></b>
 <img width="1090px" height="513" src="../image/manual/panelComisiones.png" />
 <br><br>
 <p>En el panel de comisiones veremos la lista de todas las comisiones existentes. Además, dispondremos de la opción de “Crear comision”.</p>
<br>
<p><b>Panel de edificios</p></b>
 <img width="1030px" height="455" src="../image/manual/panelEdificios.png" />
 <br><br>
 <p>En el panel de edificios veremos la lista de todas los edificios que se crearon. Adicionalmente, dispondremos de la opción de “Crear edificio”.</p>
<br>

<p><b>Panel de institutos</p></b>
 <img width="1051px" height="377" src="../image/manual/panelInstitutos.png" />
 <br><br>
 <p>En el panel de institutos veremos la lista de todas los institutos que se crearon. Adicionalmente, dispondremos de la opción de “Crear instituto”.</p>
<br>

<p><b>Panel de materias</p></b>
 <img width="1116px" height="582" src="../image/manual/panelMaterias.png" />
 <br><br>
 <p>En el panel de materias veremos la lista de todas los materias que se crearon. Adicionalmente, dispondremos de la opción de “Crear materia”.</p>
<br>

<p><b>Panel de notificaciones</p></b>
<img width="1140px" height="232" src="../image/manual/panelNoti.png" />
<br><br>
<p>En el panel de notificaciones veremos la lista de notificaciones que enviamos o recibimos.</p>
<br>

<p><b>Panel de recursos</p></b>
<img width="1118px" height="249" src="../image/manual/panelRecursos.png" />
<br><br>
<p>En el panel de recursos veremos la lista de recursos que se crearon. Adicionalmente, dispondremos de la opción de “Crear recurso”.</p>
<br>

<p><b>Panel de sedes</p></b>
<img width="1113px" height="476" src="../image/manual/panelSedes.png" />
<br><br>
<p>En el panel de sedes veremos la lista de sedes que se crearon. Adicionalmente, dispondremos de la opción de “Crear sede”.</p>
<br>
<b><h3>Gestión de usuarios</h3></b>
<br>
<p>Si entramos a gestión de usuarios nos aparecera la siguiente ventana:</p>

<img width="1198px" height="376" src="../image/manual/gestionDeUsuarios.png" />
<br>
<br>
<p> Si presionamos el botón "editar" de cualquier usuario, nos aparecera el siguiente formulario:</p>
<img width="501px" height="463" src="../image/manual/formAdmin.png" />
<br><br>

<p><b>Campos:</p></b>
<p><b>Nombre de usuario:</b> &nbsp;Debe ingresar el nombre de usuario que desea cambiar</p>
<p><b>Email:</b> &nbsp;Debe ingresar el correo que desea cambiar para el usuario.</p>
<p><b>Instituto:</b>&nbsp;Debe seleccionar el instituto que desea cambiar del usuario.Los institutos disponibles son: Ingeniería, Sociales y Salud.<p>
<p><b>Rol:</b>&nbsp;Aquí deberá seleccionar el rol que quiera cambiar para el usuario. Existen tres  tipos de roles, que son los siguientes:
<b><p>-Administrador</b></p>
<b><p>-Usuario</b></p>
<b><p>-Guest</p></b>
<br>
<p><b>Botones disponibles:</b></p>
<p><b>Guardar:</b> &nbsp;Si usted relleno los campos, deberá apretar este botón para guardar los datos.</p>
<br>

</div>







<button class="accordion">Notificaciones</button>
<div class="panel">
<br>
<p>Para acceder a Notificaciones se debe ingresar previamente al sistema.</p>
<b><p>Ingresar a Notificaciones</b><p>
<p>Seleccionaremos donde donde indica la flecha para ingresar a Notificaciones:</p>
<img width="983px" height="168" src="../image/manual/Noti.png" />
<br><br>
<p>En notificaciones podremos enviar mensajes a otros usuarios del sistema. Además, se dispondrá de un buzón de notificaciones recibidas y un buzón de notificaciones enviadas.<p>
<img width="1167px" height="173" src="../image/manual/NotiMenu.png" />
<br><br>
<p><b>Envio de notificaciones</p></b>
<p>Para enviar una notificación nos dirigiremos a donde indica la flecha de la imagen:<p>
<img width="999px" height="624" src="../image/manual/EnvioNoti.png" />
<br><br>
<p>Campos:</p>
<p><b>Usuario receptor:</b>&nbsp;Se seleccionará el usuario al que deseamos enviar la notificaciones. Adicionalmente, podremos enviar mensajes a múltiples usuarios o hacer una notificación de difusión.</p>
<p><b>Notificación:</b>&nbsp;Se escribirá la notificación que deseamos enviar.</p>
<br>
<b></p>Botones:</b></p>
<p><b>Enviar:</b>&nbsp;Este botón lo seleccionaremos una vez escrita la notificación y elegido el usuario/s receptor/es.</p>
<p>Si todo sale correctamente saldra la siguiente alerta:</p>
<img width="307px" height="173" src="../image/manual/mensajeEnviado.png" />
<br>



</div>

<button class="accordion">Cambio de contraseña</button>
<div class="panel">
<br>

<p> Si deseamos cambiar la contraseña debemos ir a la esquina superior izquierda donde se encuentra nuestro nombre de usuario:</p>
<img width="323px" height="245" src="../image/manual/cambiopw.png" />
<br><br>
<p>Seleccionaremos "Cambiar contraseña" y nos aparecera el siguiente formulario:</p>
<img width="455px" height="398" src="../image/manual/formpw.png" />
<br><br>
<p>Campos a rellenar:<p>

<p><b>Contraseña actual:</b>&nbsp; La contraseña que usted tiene actualmente</p>
<p><b>Nueva contraseña:</b>&nbsp; La nueva contraseña que desee para su cuenta.</p>
<p><b>Confirmar contraseña:</b>&nbsp; Debe repetir la contraseña nueva.</p>
<br>
<p><b>Botones disponibles:</b></p>
<p><b>Confirmar:</b>&nbsp; Si todo sale bien, luego de apretar este botón, la contraseña se cambia con éxito.</p>

<br>

</div>

<button class="accordion">Calendar</button>
<div class="panel">

<p><b><h3>IS COOMING</h3></p></b>



</div>







<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

</body>
</html>

