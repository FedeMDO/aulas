<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Manual de usuario';

?>
<style>
.manual img{
  max-width:100%;
}

@import url('https://fonts.googleapis.com/css?family=Raleway:100');


.videos{
  margin-bottom:10px;
}

.videoContent{
  max-width:100%
 
  
}

.holds-the-iframe {
  background:url(../image/loading.gif) center center no-repeat;
  background-size: 50px;
 }


.ytp-cued-thumbnail-overlay-image{
  display:flex;
  justify-content:center;
}

.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  border-bottom: 2px dodgerblue solid;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  background-color: white;
}


.box2 {
  background-color: white;
  color: black;
  padding-top:1px;
}

.contenedor{
  width:100%
  border: 1px solid #ccc;
  margin-top: 5px;
}

.panel-heading:hover{
  background-color: #ddd;
}

.manual h3 {
  font-family: 'Raleway', sans-serif;
  font-weight: 100;
  padding-bottom:5px;
}

.manual p {
  font-family: 'Raleway', sans-serif;
  font-weight: 100;
  font-size:16px;
  line-height: 1.4;
}

/*.imagen{	
  margin:10px auto;
  display:block;
}*/



.campos {
  display:block;
  grid-template-columns: 25%

}
</style>


<h2 class=titulo>¿En que podemos ayudarte?</h2>

<br>
<br>

<div class="manual" id="manualcont">
<div class="col-md-offset-2 col-md-8 content">
<div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" class="btn btn-link btn-block" role="button" style=text-align:left>
      Entrada al sistema (Login)<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse ">
      <div class="panel-body">
        <h3>¿Como ingresar a la aplicacion? </h3>
        <p>Para acceder a la aplicación, el usuario debe de hacer uso de sus credenciales de acceso (usuario o Email y contraseña).El acceso se otorgara dirigiendose al el siguiente enlace: http://yii.local/site/login</p>
        <img class="imagen"  width="8000px" src="../image/manual/Login01.png" />
        <br>
        <h3>reCAPTCHA</h3>
        <p>Puede que se le solicite completar una trivia como en el siguiente ejemplo: debera seguir los pasos indicados: </p>
        <img class="imagen"  width="8000px"  src="../image/manual/Login02.png" />
        <br>
        <p>Una vez ingresado su usuario y contraseña, pulse el botón ingresar para ingresar al sistema. Si todo sale correctamente, aparecerá en el inicio: </p>
        <img class="imagen" width="8000px"src="../image/manual/Login03.png" />
        <h3>Recuperar contraseña:</h3> 
        <p>Si no recuerda su contraseña, puede pulsar el boton ¿Olvidaste tu contraseña?. 
        <br>Le aparecerá la siguiente vista, donde usted debe ingresar su Email.
        Se le enviará un enlace a la dirección de Email que usted ingresó y así podrá restablecer su contraseña. </p>
        <img class="imagen" width="456px" height="348" src="../image/manual/rec.png" />
      </div>
    </div>
  </div>


  <div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse2" class="btn btn-link btn-block" role="button" style=text-align:left>
      Sedes<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->
        <div class="panel-group" id="accordion2">

        <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes2" class="btn btn-link btn-block" role="button" style=text-align:left>
                ¿Como acceder a sedes?
              </a></h4>
            </div>
            <div id="collapseInnerSedes2" class="panel-collapse collapse">
              <div class="panel-body">
                    <h3>¿Como acceder a sedes?</h3>
                    <p>Para acceder a la aplicación se utilizará el siguiente enlace:</p>
                    <p>http://yii.local/sede/vistav </p>
                    <img class="imagen" width="8000px" src="../image/manual/Sedes01.png" />
                    <br>
                    <p>En esta vista, nos aparecerá las sedes de la universidad.</p>
              </div>
            </div>
          </div>
          <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?> <!--Un usuario comun no puede crear -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes3" class="btn btn-link btn-block" role="button" style=text-align:left>
                Crear sedes
              </a></h4>
            </div>
            <div id="collapseInnerSedes3" class="panel-collapse collapse">
              <div class="panel-body">
              <h3>Crear sedes</h3>
                <p>Para la creación de sedes presionaremos el botón de la esquina superior izquierda:<p>
                <img class="imagen" width="8000px"  src="../image/manual/Sedes02.png" />
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos “Creación de sedes”:</p>
                <img class="imagen" width="8000px"  src="../image/manual/Sedes03.png" />
                <h3>Formulario:</h3>
                <img class="imagen" width="504px" height="538" src="../image/manual/Sedes04.png" />
                <br><br>
                <div class= "campos">
                    <h4>Campos a rellenar:</h4>
                    <ul>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de sede:&nbsp; Se deberá poner el nombre de la sede que quiera crear.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Calle:&nbsp;Se deberá poner la calle donde está ubicada la sede.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Localidad:&nbsp;Localidad donde pertenece la sede.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Disponible desde:&nbsp;Aquí debe poner desde cuando esta disponible la sede.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Disponible hasta:&nbsp;Aquí debe poner desde cuando hasta cuando estara disponible la sede.</p>
                    </ul>
                </div>
                    <br>
                    <h4>Botones disponibles:</h4>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Crear:&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos. </p>
                <br>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes4" class="btn btn-link btn-block" role="button" style=text-align:left>
                Crear comisiones
              </a></h4>
            </div>
            <div id="collapseInnerSedes4" class="panel-collapse collapse">
              <div class="panel-body">
              <h3>Crear comisiones</h3>
                <p>Para la creación de comisiones presionaremos el botón de la esquina superior izquierda:<p>
                <img class="imagen" width="8000px" src="../image/manual/Sedes02.png" />
                <br>
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos “Creación de comisiones”:</p>
                <img class="imagen" width="400px" height="378" src="../image/manual/Sedes05.png" />
                <br><br>
                <h3>Formulario:</h3>
                <img class="imagen" width="504px" height="538" src="../image/manual/Sedes06.png" />
                <br><br>
                <h4>Campos a rellenar:</h4>
                <ul>
                  <p><i class="glyphicon glyphicon-chevron-right"></i> Número:&nbsp; Debe poner el numero de comisión.</p>
                  <p><i class="glyphicon glyphicon-chevron-right"></i> Instituto:&nbsp;Seleccionará el instituto a la que estará asignada la comisión (Ingeniería, Sociales, Salud)</p>
                  <p><i class="glyphicon glyphicon-chevron-right"></i> Carrera:&nbsp;Selecciona la carrera a la que estará asignada la comisión</p>
                  <p><i class="glyphicon glyphicon-chevron-right"></i> Carga Horaria Semanal:&nbsp;Debe poner la carga horaria semanal que tendrá la comisión que desea crear.</p>
                </ul>
                <br>
                <h4>Botones disponibles:</h4>
                <p><i class="glyphicon glyphicon-chevron-right"></i> Crear:&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos. </p>
              </div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes5" class="btn btn-link btn-block" role="button" style=text-align:left>
                Crear materias
              </a></h4>
            </div>
            <div id="collapseInnerSedes5" class="panel-collapse collapse">
              <div class="panel-body">
                <h3>Creación de materias</h3>
                <p>Para la creación de materias presionaremos el botón de la esquina superior izquierda:<p>
                <img class="imagen" width="8000px" src="../image/manual/Sedes02.png" />
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos “Crear materia”:</p>
                <img class="imagen" width="400px" height="378" src="../image/manual/Sedes07.png" />
                <h3>Formulario</h3>
                <img class="imagen" width="504px" height="538" src="../image/manual/Sedes08.png" />
                <br><br>
                <ul>
                    <h4>Campos a rellenar:</h4>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre:&nbsp; Nombre de la materia.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Descripción corta:&nbsp;Se deberá indicar una descripción corta de la materia.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Codigo de materia:&nbsp;Se deberá ingresar código que tendrá asignado la materia.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Crear:&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos</p>
                </ul>
                <br>
              </div>
            </div>
          </div>
          <?php endif; ?>
          
          <div class="panel panel-default" style=margin-bottom:0px>
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes6" class="btn btn-link btn-block" role="button" style=text-align:left>
              Filtrar aulas
              </a></h4>
            </div>
            <div id="collapseInnerSedes6" class="panel-collapse collapse">
              <div class="panel-body">
              <h3>Filitrar aulas</h3>
                <p>Para ingresar al filtro de aulas presionaremos el botón de la esquina superior izquierda:<p>
                <img class="imagen" width="8000px"  src="../image/manual/Sedes02.png" />
                <br>
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos “Filtrar aulas”:</p>
                <img class="imagen" width="400px" height="378" src="../image/manual/Sedes09.png" />
                <br><br>
                <h3>Formulario:</h3>
                <img class="imagen" width="504px" height="538" src="../image/manual/Sedes10.png" />
                <br><br>
                    <ul>
                    <h4>Campos a rellenar:</h4>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de sede:&nbsp; En este campo se ingresará la sede en la cual se encuentra el aula.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de edificio:&nbsp;El edificio donde se encuentra el aula.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de recurso:&nbsp;En el caso que el aula tenga algún recurso asignado, deberá ponerlo.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Piso:&nbsp;Piso donde se encuentra el aula.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Capacidad Mínima:&nbsp;Seleccione la capacidad que tiene el aula que desea buscar.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Buscar:&nbsp; Una vez rellenado los campos deberá seleccionar este botón para buscar el aula. </p>
                    </ul>
              </div>
            </div>
          </div>
          <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
          <div class="panel panel-default" style=margin-bottom:0px>
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes7" class="btn btn-link btn-block" role="button" style=text-align:left>
                Modificar sedes
              </a></h4>
            </div>
            <div id="collapseInnerSedes7" class="panel-collapse collapse">
              <div class="panel-body">
              <h3>Modificacion de sedes</h3>
                    <p>Si usted desea modificar las sedes disponibles. Deberá ir a la opción “Modificar”:<p>
                    <img class="imagen" width="8000px"  src="../image/manual/Sedes11.png" />
                    <br>
                    <h3>Formulario:</h3>
                    <p>Una vez seleccionado el botón modificar nos dirigirá a el siguiente formulario:</p>
                    <br>
                    <img class="imagen" width="504px" height="538" src="../image/manual/Sedes12.png" />
                    <br><br>
                        <h4>Campos a rellenar:</h4>
                        <br>
                        <ul>
                          <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de sede:&nbsp; Se deberá poner el nombre de la sede que quiera crear.</p>
                          <p><i class="glyphicon glyphicon-chevron-right"></i> Calle:&nbsp;Se deberá poner la calle donde está ubicada la sede.</p>
                          <p><i class="glyphicon glyphicon-chevron-right"></i> Localidad:&nbsp;Localidad donde pertenece la sede.</p>
                          <p><i class="glyphicon glyphicon-chevron-right"></i> Disponible desde:&nbsp;Aquí debe poner desde cuando esta disponible la sede.</p>
                          <p><i class="glyphicon glyphicon-chevron-right"></i> Disponible hasta:&nbsp;Aquí debe poner desde cuando hasta cuando estara disponible la sede.</p>
                          <p><i class="glyphicon glyphicon-chevron-right"></i> Actualizar:&nbsp;Una vez rellenado los campos deberá seleccionar este botón para actualizar los datos de la sede.</p>
                        </ul>
                    <br>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>


  
  <div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse3" class="btn btn-link btn-block" role="button" style=text-align:left>
        Edificios<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseInnerEdificios1" class="btn btn-link btn-block" role="button" style=text-align:left>
              ¿Como acceder a "Edificios"?
              </a></h4>
            </div>
            <div id="collapseInnerEdificios1" class="panel-collapse collapse">
              <div class="panel-body">
                <h3>¿Como acceder a "Edificios"?</h3>
                <p>Deberá ir a sedes, como lo indica la flecha:</p>
                <br>
                <img class="imagen" width="8000px" src="../image/manual/edificios01.png" />
                <br>
                <p>&nbsp; Una vez entrada a las sedes estas aparecerán al presionar el boton entrar con el cual se podrá ingresar y ver la lista de edificios. </p>
                <br>
                <img class="imagen" width="8000px" src="../image/manual/edificios02.png" />
                <br>
                <br>
              </div>
            </div>
          </div>
          <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseInnerEdificios2" class="btn btn-link btn-block" role="button" style=text-align:left>
              Crear Edificios
              </a></h4>
            </div>
            <div id="collapseInnerEdificios2" class="panel-collapse collapse">
              <div class="panel-body">
                <h3>Creacion de edificios</h3>
                <p>Para la creación de edificios usted deberá ir donde indica la flecha:<p>
                <img class="imagen" width="8000px" src="../image/manual/edificios03.png" />
                <br>
                <p>Una vez seleccionado el botón, se desplegara el siguiente menu donde seleccionaremos "Crear edificio"</p>
                <img class="imagen" width="400px" height="378" src="../image/manual/edificios04.png" />
                <br><br>
                <h3>Formulario</h3>
                <p>Nos saldra el siguiente formulario:</p>
                <img class="imagen" width="504px" height="417" src="../image/manual/edificios05.png" />
                <br><br>
                <h4>Campos a rellenar:</h4>
                <ul>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Sede:&nbsp;Se deberá seleccionar la sede a la cual queremos asignarle el edificio.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre Edificio:&nbsp; Se deberá escribir el nombre del edificio.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Cantidad Aulas:&nbsp; Seleccione la cantidad de aulas que tendrá el edificio.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Guardar:&nbsp; Una vez rellenado los campos deberá presionar este botón para guardar los datos</p>
                </ul>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>


  <div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseAulas01" class="btn btn-link btn-block" role="button" style=text-align:left>
       Aulas<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapseAulas01" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordionAula">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordionAula" href="#collapseAula02" class="btn btn-link btn-block" role="button" style=text-align:left>
              ¿Como acceder a "Aulas"?
              </a></h4>
            </div>
            <div id="collapseAula02" class="panel-collapse collapse">
              <div class="panel-body">
                <h3>¿Como acceder a "Aulas"?</h3>
                <br>
                <p>Deberá ir a sedes, como lo indica la flecha:</p>
                <br>
                <img class="imagen" width="8000px" src="../image/manual/edificios01.png" />
                <br>
                <br>
                <p>Una vez dentro de la vista de sedes debera presionar el botón entrar:</p>
                <img class="imagen" width="8000px"  src="../image/manual/Aulas04.png" />
              </div>
            </div>
          </div>
          <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?> <!--Un usuario comun no puede crear -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseAula03" class="btn btn-link btn-block" role="button" style=text-align:left>
              ¿Como crear "Aulas"?
              </a></h4>
            </div>
            <div id="collapseAula03" class="panel-collapse collapse">
              <div class="panel-body">

              <h3>¿Como crear "Aulas"?</h3>
              <p>Para la creación de Aulas usted deberá ir donde indica la flecha:</p>
              <img class="imagen" width="8000px"src="../image/manual/aulas02.png" />
              <br><br>
                          <p>Se desplegará el siguiente menú de opciones y seleccionaremos “Crear aulas”<p>
                          <img class="imagen" width="400px" height="378" src="../image/manual/aulas03.png" />
                          <br><br>
                          <h3>Formulario</h3>
                          <p>Se nos abrira el siguiente formulario:<p>
                          <img class="imagen" width="449px" height="466" src="../image/manual/CrearAula.png" />
                          <h4>Campos a rellenar:<h4>
                          <ul>
                            <p><i class="glyphicon glyphicon-chevron-right"></i> Aula:&nbsp; Ingrese el nombre del aula.</p>
                            <p><i class="glyphicon glyphicon-chevron-right"></i> Edificio:&nbsp; Seleccione el edificio al que le quiera asignar el aula.</p>
                            <p><i class="glyphicon glyphicon-chevron-right"></i> Piso:&nbsp; Ingrese el piso donde estará ubicada el aula.</p>
                            <p><i class="glyphicon glyphicon-chevron-right"></i> Capacidad:&nbsp; Ingrese el piso donde estará ubicada el aula.</p>
                            <p><i class="glyphicon glyphicon-chevron-right"></i> Guardar:&nbsp; Una vez rellenado los campos deberá presionar este botón para guardar los datos</p>
                          </ul>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseAula04" class="btn btn-link btn-block" role="button" style=text-align:left>
              Filtrar aulas
              </a></h4>
            </div>
            <div id="collapseAula04" class="panel-collapse collapse">
              <div class="panel-body">

              <h3>Filitrar aulas</h3>
                <p>Para ingresar al filtro de aulas presionaremos el botón de la esquina superior izquierda:<p>
                <img class="imagen" width="8000px"  src="../image/manual/Sedes02.png" />
                <br>
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos “Filtrar aulas”:</p>
                <img class="imagen" width="400px" height="378" src="../image/manual/Sedes09.png" />
                <br><br>
                <h3>Formulario:</h3>
                <img class="imagen" width="504px" height="538" src="../image/manual/Sedes10.png" />
                <br><br>
                    <ul>
                    <h4>Campos a rellenar:</h4>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de sede:&nbsp; En este campo se ingresará la sede en la cual se encuentra el aula.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de edificio:&nbsp;El edificio donde se encuentra el aula.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de recurso:&nbsp;En el caso que el aula tenga algún recurso asignado, deberá ponerlo.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Piso:&nbsp;Piso donde se encuentra el aula.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Capacidad Mínima:&nbsp;Seleccione la capacidad que tiene el aula que desea buscar.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Buscar:&nbsp; Una vez rellenado los campos deberá seleccionar este botón para buscar el aula. </p>
                    </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>



  <div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse5" class="btn btn-link btn-block" role="button" style=text-align:left>
        Institutos<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="panel-body">
      <h3>¿Como acceder a institutos? </h3>
      <p>Deberá ir a institutos, como lo indica la flecha:</p>
      <img class="imagen" width="8000px" src="../image/manual/institutos01.png" />
      <br><br>
      <p>La vista de institutos contiene informacion acerca de los usuarios registrados en el sistema con su correspondiente instituto.</p>
      <img class="imagen" width="504px" height="538" src="../image/manual/institutos02.png" style="display:grid; margin:auto;" />

      </div>
    </div>
  </div>

  <div class="panel panel-default " style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse05" class="btn btn-link btn-block" role="button" style=text-align:left>
        Carreras<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapse05" class="panel-collapse collapse">
      <div class="panel-body">
      <h3>¿Como acceder a "Carreras"? </h3>
      <p>Seleccionaremos donde donde indica la flecha para ingresar a carreras:</p>
      <img class="imagen" width="8000px" src="../image/manual/Carreras01.png" />
      <br><br>
      <p>Como se aprecia en la imagen, aparecerá las materias pertenecientes a cada carrera que seleccionemos:</p>
      <img class="imagen" width="504px"  src="../image/manual/Carreras02.png" style="display:grid; margin:auto;" />
      <br>
      </div>
    </div>
  </div>


  <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
  <div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse06" class="btn btn-link btn-block" role="button" style=text-align:left>
        Administración<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapse06" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion06">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion06" href="#collapseInnerAdmin01" class="btn btn-link btn-block" role="button" style=text-align:left>
              ¿Como acceder a "Administración"?
              </a></h4>
            </div>
            <div id="collapseInnerAdmin01" class="panel-collapse collapse">
              <div class="panel-body">
              <h3>¿Como acceder a "Administración"? </h3>
              <p>Debe ir donde indica la flecha:</p>
              <img class="imagen" width="8000px" src="../image/manual/Admin01.png" />
              <br><br>
              <p>Nos aparecera cuatro modulos en administración: Registro de usuario, Panel de administración , Gestionar usuarios y Reportes:</p>
              <img class="imagen" width="243px" height="160" src="../image/manual/Admin02.png" />
              <br><br>

              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion06" href="#collapseInnerAdmin02" class="btn btn-link btn-block" role="button" style=text-align:left>
              Registro de usuario
              </a></h4>
            </div>
            <div id="collapseInnerAdmin02" class="panel-collapse collapse">
              <div class="panel-body">
                      <h3>Registrar usuarios</h3>
                      <p>Para acceder al registro de usuarios, se debe ser Admin, ya que es el único capaz de generar usuarios para el sistema. 
                      Accederemos al registro a través del siguiente el siguiente enlace:
                      http://yii.local/site/register </p>
                      <img class="imagen" width="514px" height="612" src="../image/manual/Admin03.png" style="display:grid; margin:auto;" />
                      <br>
                      <br>
                     <h4>Campos a rellenar</h4>
                     <ul>
                        <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de usuario: &nbsp;Se debe escoger el nombre que se le asignará al usuario que desea registrar al sistema.</p>
                        <p><i class="glyphicon glyphicon-chevron-right"></i> Email: &nbsp;Se debe escribir el Email del usuario al que se desea registrar al sistema.</p>
                        <p><i class="glyphicon glyphicon-chevron-right"></i> Instituto:&nbsp;Se debe seleccionar a qué instituto pertenece el usuario. Los institutos disponibles son: Ingeniería, Sociales y Salud.<p>
                        <p><i class="glyphicon glyphicon-chevron-right"></i> Permisos de usuario:&nbsp;Aquí deberá seleccionar los permisos que tendrá el usuario. Existen tres  tipos de permisos, que son los siguientes:
                          <li style="margin-left:5%"><p>Administrador.</p></li>
                          <li style="margin-left:5%"><p>Usuario.</p></li>
                          <li style="margin-left:5%"><p>Guest.</p></li>
                          <p><i class="glyphicon glyphicon-chevron-right"></i> Contraseña: &nbsp;Se deberá ingresar la contraseña que le asignaremos al el usuario, con un mínimo de 6 y máximo de 16 caracteres.</p>
                          <p><i class="glyphicon glyphicon-chevron-right"></i> Finalizar registro: &nbsp;Si usted relleno los campos, deberá apretar este botón para finalizar el registro. Le aparecerá la siguiente imagen:</p>
                          <img class="imagen" width="300px" height="189" src="../image/manual/alertreg.png" />
                          <br>
                          <br>
                          <p>Nota:&nbsp;Deberá ingresar a el Email del usuario que se registro al sistema, para confirmar su registro.<p>
                      </ul>
              </div>
            </div>
          </div>


          <div class="panel panel-default" style=margin-bottom:0px>
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion06" href="#collapseInnerAdmin03" class="btn btn-link btn-block" role="button" style=text-align:left >
              Panel de administración
              </a></h4>
            </div>
            <div id="collapseInnerAdmin03" class="panel-collapse collapse">
              <div class="panel-body">
                       <h3>Panel de administración</h3>
                       <p>En panel de administración usted podrá ver en el inicio algunas estadísticas generales como: el número de usuarios
                        registrados, de carreras, de materias y institutos. Además en la columna izquierda podrá entrar a los paneles de: 
                        aulas, carreras, comisiones, edificios, institutos, materias, notificaciones, recursos y de sedes..</p>
                        <img class="imagen" width="8000px" src="../image/manual/Admin04.png" />
                        <br><br>
                        <h3>Paneles disponibles</h3>
                        <img class="imagen" width="8000px" src="../image/manual/Admin05.png" />
                        <br><br>
                        <h3>Panel de aulas</h3>
                        <p>En el panel de aulas veremos la lista de todas las aulas que se crearon. Adicionalmente, dispondremos de la opción de “Crear aula”.</p>
                        <img class="imagen" width="8000px"  src="../image/manual/panelDeAula.png" />
                        <br>
                        <h3>Panel de carrera:</h3>
                        <p>En el panel de carreras veremos la lista de todas las carreras que se crearon. Adicionalmente, dispondremos de la opción de “Crear carrera”.</p>
                        <img class="imagen" width="8000px"  src="../image/manual/panelCarrera.png" />
                        <br><br>
                        <h3>Panel de comisiones:</h3>
                        <p>En el panel de comisiones veremos la lista de todas las comisiones existentes. Además, dispondremos de la opción de “Crear comision”.</p>
                        <img class="imagen" width="8000px"  src="../image/manual/panelComisiones.png" />
                        <br><br>
                        <h3>Panel de edificios:</h3>
                        <p>En el panel de edificios veremos la lista de todas los edificios que se crearon. Adicionalmente, dispondremos de la opción de “Crear edificio”.</p>
                        <img class="imagen" width="8000px"  src="../image/manual/panelEdificios.png" />
                        <br><br>
                        <h3>Panel de institutos:</h3>
                        <p>En el panel de institutos veremos la lista de todas los institutos que se crearon. Adicionalmente, dispondremos de la opción de “Crear instituto”.</p>
                        <img class="imagen" width="8000px"  src="../image/manual/panelInstitutos.png" />
                        <br><br>
                        <p>Panel de materias:</p>
                        <p>En el panel de materias veremos la lista de todas los materias que se crearon. Adicionalmente, dispondremos de la opción de “Crear materia”.</p>
                        <img class="imagen" width="8000px"  src="../image/manual/panelMaterias.png" />
                        <br><br>
                        <h3>Panel de notificaciones:</h3>
                        <p>En el panel de notificaciones veremos la lista de notificaciones que enviamos o recibimos.</p>
                        <img class="imagen" width="8000px" src="../image/manual/panelNoti.png" />
                        <br><br>
                        <h3>Panel de recursos:</h3>
                        <p>En el panel de recursos veremos la lista de recursos que se crearon. Adicionalmente, dispondremos de la opción de “Crear recurso”.</p>
                        <img class="imagen" width="8000px" src="../image/manual/panelRecursos.png" />
                        <br><br>
                        <p>Panel de sedes:</p>
                        <p>En el panel de sedes veremos la lista de sedes que se crearon. Adicionalmente, dispondremos de la opción de “Crear sede”.</p>
                        <img class="imagen" width="8000px" src="../image/manual/panelSedes.png" />
                        <br><br>
              </div>
            </div>
          </div>


       <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion06" href="#collapseInnerAdmin04" class="btn btn-link btn-block" role="button" style=text-align:left>
              Gestión de usuarios
              </a></h4>
            </div>
            <div id="collapseInnerAdmin04" class="panel-collapse collapse">
              <div class="panel-body">
                    <h3>Gestión de usuarios</h3>
                    <p>Si entramos a gestión de usuarios nos aparecera la siguiente ventana:</p>
                    <img class="imagen" width="8000px" src="../image/manual/gestionDeUsuarios.png" />
                    <br>
                    <br>
                    <h3>Formulario</h3>
                    <p> Si presionamos el botón "editar" de cualquier usuario, nos aparecera el siguiente formulario:</p>
                    <img class="imagen" width="501px" height="463" src="../image/manual/formAdmin.png" />
                    <br><br>
                 <h4>Campos a rellenar:</h4>
                 <ul>
                  <p><i class="glyphicon glyphicon-chevron-right"></i> Nombre de usuario: &nbsp;Debe ingresar el nombre de usuario que desea cambiar</p>
                  <p><i class="glyphicon glyphicon-chevron-right"></i> Email: &nbsp;Debe ingresar el correo que desea cambiar para el usuario.</p>
                  <p><i class="glyphicon glyphicon-chevron-right"></i> Instituto:&nbsp;Debe seleccionar el instituto que desea cambiar del usuario.Los institutos disponibles son: Ingeniería, Sociales y Salud.<p>
                  <p><i class="glyphicon glyphicon-chevron-right"></i> Rol:&nbsp;Aquí deberá seleccionar el rol que quiera cambiar para el usuario. Existen tres  tipos de roles, que son los siguientes:
                            <li style="margin-left:5%"><p>Administrador.</p></li>
                            <li style="margin-left:5%"><p>Usuario.</p></li>
                            <li style="margin-left:5%"><p>Guest.</p></li>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Guardar:&nbsp;Si usted relleno los campos, deberá apretar este botón para guardar los datos.</p>
                  </ul>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion06" href="#collapseInnerAdmin05" class="btn btn-link btn-block" role="button" style=text-align:left>
              Reportes
              </a></h4>
            </div>
            <div id="collapseInnerAdmin05" class="panel-collapse collapse">
              <div class="panel-body">
                    <h3>Reportes</h3>
                    <p>Si entramos a Reportes podremos encontrar informacion util:</p>
                    <img class="imagen" width="8000px" src="../image/manual/Admin07.png" />
                    <img class="imagen" width="8000px" src="../image/manual/Admin08.png" />
              </div>
            </div>
          </div>
        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>
  <?php endif; ?>
 <div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseNoti01" class="btn btn-link btn-block" role="button" style=text-align:left>
        Notificaciones<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapseNoti01" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordionNoti01">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordionNoti01" href="#collapseInnerNoti02" class="btn btn-link btn-block" role="button" style=text-align:left>
              Acceso a las notificaciones
              </a></h4>
            </div>
            <div id="collapseInnerNoti02" class="panel-collapse collapse">
              <div class="panel-body">
                <h3>Ingresar a Notificaciones</h3>
                <p>Seleccionaremos donde donde indica la flecha para ingresar a Notificaciones:</p>
                <img class="imagen" width="8000px" src="../image/manual/Noti01.png" />
                <br><br>
                <p>En notificaciones podremos enviar mensajes a otros usuarios del sistema. Además, se dispondrá de un buzón de notificaciones recibidas y un buzón de notificaciones enviadas.<p>
                <img class="imagen" width="8000px" src="../image/manual/Noti02.png" />
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordionNoti01" href="#collapseInnerNoti03" class="btn btn-link btn-block" role="button" style=text-align:left>
              Envio de notificaciones
              </a></h4>
            </div>
            <div id="collapseInnerNoti03" class="panel-collapse collapse">
              <div class="panel-body">
              <h3>Enviar notificacion</h3>
              <p>Para enviar una notificación nos dirigiremos a Nueva notificacion<p>
              <img class="imagen" width="8000px" src="../image/manual/Noti03.png" />
              <br>
              
              <h4>Campos:</h4>
              <p><i class="glyphicon glyphicon-chevron-right"></i> Usuario receptor:&nbsp;Se seleccionará el usuario al que deseamos enviar la notificaciones. Adicionalmente, podremos enviar mensajes a múltiples usuarios o hacer una notificación de difusión.</p>
              <p><i class="glyphicon glyphicon-chevron-right"></i> Notificación:&nbsp;Se escribirá la notificación que deseamos enviar.</p>
              <h4>Botones:</h4>
              <p><i class="glyphicon glyphicon-chevron-right"></i> Enviar:&nbsp;Este botón lo seleccionaremos una vez escrita la notificación y elegido el usuario/s receptor/es.</p>
              <p>Si todo sale correctamente saldra la siguiente alerta:</p>
              <img class="imagen" width="307px" height="173" src="../image/manual/mensajeEnviado.png" />        
                

              </div>
            </div>
          </div>

        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>


  

    <div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse7" class="btn btn-link btn-block" role="button" style=text-align:left>
       Cambio de contraseña<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse">
      <div class="panel-body">

      <h3>Cambio de contraseña</h3>
      <p> Si deseamos cambiar la contraseña debemos ir a la esquina superior izquierda donde se encuentra nuestro nombre de usuario:</p>
      <img class="imagen" src="../image/manual/cambiopw.png" />
      <br><br>
      <h3>Formulario</h3>
      <p>Seleccionaremos "Cambiar contraseña" y nos aparecera el siguiente formulario:</p>
      <img class="imagen" width="455px" height="398" src="../image/manual/formpw.png" />
      <br>
      <h4>Campos a rellenar:</h4>
      <ul>
          <p><i class="glyphicon glyphicon-chevron-right"></i>Contraseña actual:&nbsp; La contraseña que usted tiene actualmente</p>
          <p><i class="glyphicon glyphicon-chevron-right"></i>Nueva contraseña:&nbsp; La nueva contraseña que desee para su cuenta.</p>
          <p><i class="glyphicon glyphicon-chevron-right"></i>Confirmar contraseña:&nbsp; Debe repetir la contraseña nueva.</p>
          <p><i class="glyphicon glyphicon-chevron-right"></i>Confirmar:&nbsp; Si todo sale bien, luego de apretar este botón, la contraseña se cambia con éxito.</p>
      </ul>  
<br>

      </div>
    </div>
  </div>


  <div class="panel panel-default" style=margin-bottom:0px>
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse10" class="btn btn-link btn-block" role="button" style=text-align:left>
        Calendario<i style="float:right" class="glyphicon glyphicon-chevron-down">  </i>
      </a></h4>
    </div>
    <div id="collapse10" class="panel-collapse collapse">
      <div class="panel-body">
 
        <!-- Here we insert another nested accordion -->
        <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerOne" class="btn btn-link btn-block" role="button" style=text-align:left>
              Ir a agenda
              </a></h4>
            </div>
            <div id="collapseInnerOne" class="panel-collapse collapse">
              <div class="panel-body">
              <p>Ir a agenda</p>

                <p>Debemos seleccionar el botón “Agenda” del aula que nosotros queramos crear eventos. Se le dirigirá a la siguiente ventana:</p> 
                <img class="imagen" width="512px" height="220" src="../image/manual/ventanaCalendar.png" />
                <br><br>
                <p>Botones disponibles:</p>
                
               <p>Nuevo evento: &nbsp;Si usted selecciona este botón se le direccionará a un formulario.</p>
               <p>Día:&nbsp;Si queremos ver los eventos por día debemos seleccionar este botón.</p>
                <p>Semana: &nbsp;Si queremos ver los eventos por semana debemos seleccionar este botón.</p>
               <p>Mes:&nbsp;Si queremos ver los eventos por mes seleccionar este botón.
                 <br>
           
                </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerTwo" class="btn btn-link btn-block" role="button" style=text-align:left>
                Crear evento
              </a></h4>
            </div>
            <div id="collapseInnerTwo" class="panel-collapse collapse">
              <div class="panel-body">

                            <p>Debemos dirigirnos donde indica la flecha:</p>
                            <br>
                            <img class="imagen" width="769px" height="347" src="../image/manual/newEvent.png" />
                            <br><br>
                            <p>Una vez hecho esto, nos aparecerá el siguiente formulario:</p>
                            <br>
                            <img class="imagen" width="521px" height="351" src="../image/manual/formEvent.png" />

                            <br><br>
                            <p>Campos:</p>
                          
                          <p>Carrera:&nbsp;Seleccione la carrera </p>
                           <p>Materia:&nbsp;Seleccione materia correspondiente a la Carrera elegida previamente</p>
                           <p>Comisión:&nbsp;Seleccione la comisión perteneciente a la Materia elegida previamente</p>
                          <p>Dia: &nbsp;Seleccionar el día (Lun a Sab)</p>
                          <p>Desde las:&nbsp;Seleccione el horario inicial</p>
                          <p>Hasta las:&nbsp;Seleccione el horario final</p>                           
                          <p>Guardar:&nbsp;Una vez que lleno el formulario, seleccione este botón para guardar los datos.</p>
                           <p>Cerrar: &nbsp;Si desea cancelar el evento que está creando, seleccione este botón.</p>
                            
                            <br>
                            <p>Una vez guardado el evento, usted podrá ver la materia en (Día, Hora y Mes) todo el cuatrimestre:</p>
                            <br>
                            <p><h4>Vista de materia por Día</p></h4>
                            <br>
                            <p>En la siguiente imagen se puede apreciar la vista paronamica del evento por día:
                            <br><br>
                            <img class="imagen" width="702px" height="314" src="../image/manual/vistaporDia.png" />
                            <br><br>

                            <p><h4>Vista de materia por Semana</p></h4>
                            <br>
                            <p>En la siguientes imágenes se apreciara una vista panorámica por semana, de la planificación que usted eligió para dicha materia. Podrá observar que la materia estará cada semana en el mismo horario elegido.</p>
                            <br>
                            <p>Ejemplo:&nbsp; Semana 19 de noviembre al 24 de noviembre:</p> 
                            <br>
                            <img class="imagen" width="686px" height="197" src="../image/manual/vistaSemana01.png" />
                            <br><br>
                            <p>Ejemplo:&nbsp; Semana 26 de noviembre al 1 de diciembre:</p> 
                            <br>
                            <img class="imagen" width="657px" height="333" src="../image/manual/vistaSemana.png" />
                            <br><br>
                            <h4><p>Vista de materia por Mes</p></h4>
                            <br>
                            <p>En la próxima imagen verá con más claridad cómo la materia que eligió está planificada en todo el mes, el mismo día.</p>
                            <img class="imagen" width="747px" height="359" src="../image/manual/vistaporMes.png" />
                            <br><br>

                  </div>
              </div>
            
            </div>
          </div>
        <!-- Inner accordion ends here -->
            </div>
          </div>
        </div>
        </div>
</div>
<div class="col-md-offset-2 col-md-8 content">
<h2 class="titulo">Videos que te ayudaran con lo basico</h2>
<div class=videos >
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Sedes')" id="defaultOpen">Sedes</button>
  <button class="tablinks" onclick="openCity(event, 'Edificios')">Edificios</button>
  <button class="tablinks" onclick="openCity(event, 'Aulas')">Aulas</button>
  <button class="tablinks" onclick="openCity(event, 'Institutos')" id="defaultOpen">Institutos</button>
  <button class="tablinks" onclick="openCity(event, 'Carreras')">Carreras</button>
  <button class="tablinks" onclick="openCity(event, 'Administracion')">Administracion</button>
</div>


<div id="Sedes" class="tabcontent">

<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>

<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>

<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
</div>



<div id="Edificios" class="tabcontent">
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
</div>

<div id="Aulas" class="tabcontent">
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>

</div>

<div id="Institutos" class="tabcontent">
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>

</div>

<div id="Carreras" class="tabcontent">
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>

</div>

<div id="Administracion" class="tabcontent">
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>
<div class= "box2 col-md-4" >
  <div class="holds-the-iframe">
    <iframe width="100%" height="315px" class="videoContent" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
  </div>
</div>

</div>

</div>
</div>

</div>
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "flow-root";
  evt.currentTarget.className += " active";
}



// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
