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
</style>
<h2 class=titulo>Manual de usuario</h2>

<br>
<br>

<div class="manual" id="manualcont">
<div class="col-md-offset-2 col-md-8 content">
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" class="btn btn-link btn-block" role="button" style=text-align:left>
      Entrada al sistema (Login)
      </a></h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse ">
      <div class="panel-body">
        <h3><b>¿Como ingresar a la aplicacion? </b></h3>
        <p>Para acceder a la aplicación, el usuario debe de hacer uso de sus credenciales de acceso (usuario o Email y contraseña).</p>
        <p>El acceso se otorgara dirigiendose al el siguiente enlace: http://yii.local/site/login</p>
        <img width="765px" height="392" src="../image/manual/pastedmage0.png" />
        <br>
        <br>
        <p>Una vez ingresado su usuario y contraseña, pulse el botón ingresar para ingresar al sistema. Si todo sale correctamente, aparecerá en el inicio: </p>
        <img width="819px" height="417" src="../image/manual/inicio.png" />
        <br>
        <br>
        <h3><b>Recuperar contraseña:</b></h3> 
        <p>Si no recuerda su contraseña, puede pulsar el boton ¿Olvidaste tu contraseña?. 
        <br>Le aparecerá la siguiente vista, donde usted debe ingresar su Email.
        Se le enviará un enlace a la dirección de Email que usted ingresó y así podrá restablecer su contraseña. </p>
        <img width="456px" height="348" src="../image/manual/rec.png" />
      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse2" class="btn btn-link btn-block" role="button" style=text-align:left>
      Sedes
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
              <br>
                    <p>Para acceder a el módulo de sedes, se debe ingresar previamente al sistema.<p>
                    <h3><b>¿Como acceder a sedes?</b></h3>
                    <p>Para acceder a la aplicación se utilizará el siguiente enlace:</p>
                    <p>http://yii.local/sede/vistav </p>
                    <img width="673px" height="270" src="../image/manual/vistasedes.png" />
                    <br>
                    <br>
                    <p>En esta vista, nos aparecerá las sedes de la universidad.</p>
              </div>
            </div>
          </div>




          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes3" class="btn btn-link btn-block" role="button" style=text-align:left>
                Crear sedes
              </a></h4>
            </div>
            <div id="collapseInnerSedes3" class="panel-collapse collapse">
              <div class="panel-body">
              <h3><b>Crear sedes</b></h3>
                <br>
                <p>Para la creación de sedes presionaremos el botón de la esquina superior izquierda:<p>
                <img width="638px" height="343" src="../image/manual/createsedes.png" />
                <br>
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos <b>“Creación de sedes”:</b></p>
                <img width="200px" height="378" src="../image/manual/menu.png" />
                <br><br>
                <p>Nos saldra el siguiente formulario:</b>:</p>
                <img width="504px" height="538" src="../image/manual/crearsede.png" />
                <br><br>
                <ul>
                    <p><b>Campos a rellenar:</b><p>
                    <li><p><b>Nombre de sede:</b>&nbsp; Se deberá poner el nombre de la sede que quiera crear.</p></li>
                    <li><p><b>Calle:</b>&nbsp;Se deberá poner la calle donde está ubicada la sede.</p></li>
                    <li><p><b>Localidad:</b>&nbsp;Localidad donde pertenece la sede.</p></li>
                    <li><p><b>Disponible desde:</b>&nbsp;Aquí debe poner desde cuando esta disponible la sede.</p></li>
                    <li><p><b>Disponible hasta:</b>&nbsp;Aquí debe poner desde cuando hasta cuando estara disponible la sede.</p></li>
                </ul>
                <br>
                <ul>
                    <p><b>Botones disponibles:</b></p>
                    <li><p><b>Crear:</b>&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos. </p></li>
                </ul>
                <br>.
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
              <h3><b>Crear comisiones</b></h3>
                <br>
                <p>Para la creación de comisiones presionaremos el botón de la esquina superior izquierda:<p>
                <img width="638px" height="343" src="../image/manual/createsedes.png" />
                <br>
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos <b>“Creación de comisiones”:</b></p>
                <img width="200px" height="378" src="../image/manual/menu.png" />
                <br><br>
                <p>Nos saldra el siguiente formulario:</b></p>
                <img width="296px" height="348" src="../image/manual/crearcomi.png" />
                <br><br>
                <p>Campos a rellenar:<p>
                <p><b>Número:</b>&nbsp; Debe poner el numero de comisión.</p>
                <p><b>Instituto:</b>&nbsp;Seleccionará el instituto a la que estará asignada la comisión (Ingeniería, Sociales, Salud)</p>
                <p><b>Carrera:</b>&nbsp;Selecciona la carrera a la que estará asignada la comisión</p>
                <p><b>Carga Horaria Semanal:</b>&nbsp;Debe poner la carga horaria semanal que tendrá la comisión que desea crear.</p>
                <br>
                <p><b>Botones disponibles:</b></p>
                <p><b>Crear:</b>&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos. </p>
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
                <h3><b>Creación de materias</b></h3>
                <br>
                <p>Para la creación de materias presionaremos el botón de la esquina superior izquierda:<p>
                <img width="638px" height="343" src="../image/manual/createsedes.png" />
                <br>
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos <b>“Crear materia”:</b></p>
                <img width="200px" height="378" src="../image/manual/menu.png" />
                <br><br>
                <p>Nos saldra el siguiente formulario:</b></p>
                <img width="485px" height="428" src="../image/manual/crearmat.png" />
                <br><br>
                <ul>
                    <p><b>Campos a rellenar:</b><p>
                    <li><p><b>Nombre:</b>&nbsp; Nombre de la materia.</p></li>
                    <li><p><b>Descripción corta:</b>&nbsp;Se deberá indicar una descripción corta de la materia.</p></li>
                    <li><p><b>Codigo de materia:</b>&nbsp;Se deberá ingresar código que tendrá asignado la materia.</p></li>
                    <li><p><b>Crear:</b>&nbsp; Una vez rellenado los campos deberá seleccionar este botón para guardar los datos</p></li>
                </ul>
                <br>
              </div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes6" class="btn btn-link btn-block" role="button" style=text-align:left>
              Filtrar aulas
              </a></h4>
            </div>
            <div id="collapseInnerSedes6" class="panel-collapse collapse">
              <div class="panel-body">
              <h3><b>Filitrar aulas</b></h3>
                <br>
                <p>Para ingresar al filtro de aulas presionaremos el botón de la esquina superior izquierda:<p>
                <img width="638px" height="343" src="../image/manual/createsedes.png" />
                <br>
                <p>Se desplegará el siguiente menú de opciones y seleccionaremos <b>“Filtrar aulas”:</b></p>
                <img width="200px" height="378" src="../image/manual/menu.png" />
                <br><br>
                <p>Nos saldra el siguiente formulario:</b></p>
                <img width="469px" height="508" src="../image/manual/filtrau.png" />
                <br><br>
                <ul>
                    <p>Campos a rellenar:<p>
                    <li><p><b>Nombre de sede:</b>&nbsp; En este campo se ingresará la sede en la cual se encuentra el aula.</p></li>
                    <li><p><b>Nombre de edificio:</b>&nbsp;El edificio donde se encuentra el aula.</p></li>
                    <li><p><b>Nombre de recurso:</b>&nbsp;En el caso que el aula tenga algún recurso asignado, deberá ponerlo.</p></li>
                    <li><p><b>Piso:</b>&nbsp;Piso donde se encuentra el aula.</p></li>
                    <li><p><b>Capacidad Mínima:</b>&nbsp;Seleccione la capacidad que tiene el aula que desea buscar.</p></li>
                    <li><p><b>Buscar:</b>&nbsp; Una vez rellenado los campos deberá seleccionar este botón para buscar el aula. </p></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes7" class="btn btn-link btn-block" role="button" style=text-align:left>
                Modificar sedes
              </a></h4>
            </div>
            <div id="collapseInnerSedes7" class="panel-collapse collapse">
              <div class="panel-body">
              <h3><b>Modificacion de sedes</b></h3>
                    <br>
                    <p>Si usted desea modificar las sedes disponibles. Deberá ir a la opción “Modificar”:<p>
                    <img width="433x" height="420" src="../image/manual/modificar.png" />
                    <br>
                    <p>Una vez seleccionado el botón modificar nos dirigirá a el siguiente formulario:</p>
                    <img width="494px" height="534" src="../image/manual/actualizarSede.png" />
                    <br><br>
                    <ul>
                        <p>Campos a rellenar:<p>
                        <li><p><b>Nombre de sede:</b>&nbsp; Se deberá poner el nombre de la sede que quiera crear.</p></li>
                        <li><p><b>Calle:</b>&nbsp;Se deberá poner la calle donde está ubicada la sede.</p></li>
                        <li><p><b>Localidad:</b>&nbsp;Localidad donde pertenece la sede.</p></li>
                        <li><p><b>Disponible desde:</b>&nbsp;Aquí debe poner desde cuando esta disponible la sede.</p></li>
                        <li><p><b>Disponible hasta:</b>&nbsp;Aquí debe poner desde cuando hasta cuando estara disponible la sede.</p></li>
                        <li><p><b>Actualizar:</b>&nbsp;Una vez rellenado los campos deberá seleccionar este botón para actualizar los datos de la sede.</p></li>
                    </ul>
                    <br>
              </div>
            </div>
          </div>
        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>







  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse3" class="btn btn-link btn-block" role="button" style=text-align:left>
        Edificios
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
                <p>Para acceder a "Edificios", se debe ingresar previamente al sistema.<p>
                <h3><b>¿Como acceder a "Edificios"?</b></h3>
                <br>
                <p>Deberá ir a sedes, como lo indica la flecha azul:</p>
                <br>
                <img width="803px" height="410" src="../image/manual/edin.png" />
                <br>

                <p><b></b>&nbsp; Una vez entrada a las sedes estas aparecerán al presionar el boton entrar con el cual se podrá ingresar y ver la lista de edificios. </p>
                <br>
                <img width="659px" height="314" src="../image/manual/edificios.png" />
                <br>
                <br>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseInnerEdificios2" class="btn btn-link btn-block" role="button" style=text-align:left>
              Crear Edificios
              </a></h4>
            </div>
            <div id="collapseInnerEdificios2" class="panel-collapse collapse">
              <div class="panel-body">
                <br>
                <p>Para la creación de edificios usted deberá ir donde indica la flecha:<p>
                <img width="682x" height="384" src="../image/manual/creacionedi02.png" />
                <br>
                <p>Una vez seleccionado el botón, se desplegara el siguiente menu donde seleccionaremos "<b>Crear edificio</b>"</p>
                <img width="199px" height="243" src="../image/manual/menuedi.png" />
                <br><br>
                <p>Nos saldra el siguiente formulario:</b></p>
                <img width="504px" height="417" src="../image/manual/crearEdi.png" />
                <br><br>
                <ul>
                    <p><b>Campos a rellenar:</b><p>
                    <li><p><b>Sede:</b>&nbsp;Se deberá seleccionar la sede a la cual queremos asignarle el edificio.</p></li>
                    <li><p><b>Nombre Edificio:</b>&nbsp; Se deberá escribir el nombre del edificio.</p></li>
                    <li><p><b>Cantidad Aulas:</b>&nbsp; Seleccione la cantidad de aulas que tendrá el edificio.</p></li>
                    <li><p><b>Guardar:</b>&nbsp; Una vez rellenado los campos deberá presionar este botón para guardar los datos</p></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseAulas01" class="btn btn-link btn-block" role="button" style=text-align:left>
       Aulas
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

              <p>Para acceder a "Aulas", se debe ingresar previamente al sistema.<p>
                <h3><b>¿Como acceder a "Aulas"?</b></h3>
                <br>
                <p>Deberá ir a sedes, como lo indica la flecha negra:</p>
                <br>
                <img width="512px" height="34" src="../image/manual/panelaula.png" />
                <br>
                <br>
                <p>Una vez dentro de la vista de sedes debera presionar el botón entrar:</p>
                <img width="672px" height="293" src="../image/manual/aula02.png" />
               

              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseAula03" class="btn btn-link btn-block" role="button" style=text-align:left>
              ¿Como crear "Aulas"?
              </a></h4>
            </div>
            <div id="collapseAula03" class="panel-collapse collapse">
              <div class="panel-body">

              <h3><b>¿Como crear "Aulas"?</b></h3>
              <br>
              <p>Para la creación de Aulas usted deberá ir donde indica la flecha:</p>
              <img width="760px" height="367" src="../image/manual/aulas.png" />
              <br><br>
                          <p>Se desplegará el siguiente menú de opciones y seleccionaremos “Crear aulas”<p>
                          <img width="176px" height="336" src="../image/manual/menuCrearAula.png" />
                          <br><br>
                          <p>Se nos abrira el siguiente formulario:<p>
                          <img width="449px" height="466" src="../image/manual/CrearAula.png" />

                          
                      <ul>
                          <b><p>Campos a rellenar:<p></b>
                          <li><p><b>Aula:</b>&nbsp; Ingrese el nombre del aula.</p></li>
                          <li><p><b>Edificio:</b>&nbsp; Seleccione el edificio al que le quiera asignar el aula.</p></li>
                          <li><p><b>Piso:</b>&nbsp; Ingrese el piso donde estará ubicada el aula.</p></li>
                          <li><p><b>Capacidad:</b>&nbsp; Ingrese el piso donde estará ubicada el aula.</p></li>
                          <li><p><b>Guardar:</b>&nbsp; Una vez rellenado los campos deberá presionar este botón para guardar los datos</p></li>
                          </ul>

              </div>
            </div>
          </div>
        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>










  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse5" class="btn btn-link btn-block" role="button" style=text-align:left>
        Institutos
      </a></h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="panel-body">

      <h3><b>¿Como acceder a institutos </b></h3>
      <br>
      <p>Para acceder a institutos, se debe ingresar previamente al sistema.</p>
      <b><p>Ingresar a institutos</b><p>
      <p>Deberá ir a institutos, como lo indica la flecha negra:</p>
      <img width="713px" height="311" src="../image/manual/institutos.png" />
      <br><br>
      <p>En la siguiente imagen se podra apreciar los usuarios pertenecientes a cada instituto que seleccionemos:</p>
      <img width="419px" height="496" src="../image/manual/instiExpand.png" />

      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse05" class="btn btn-link btn-block" role="button" style=text-align:left>
        Carreras
      </a></h4>
    </div>
    <div id="collapse05" class="panel-collapse collapse">
      <div class="panel-body">

      <h3><b>¿Como acceder a "Carreras"? </b></h3>
      <br>
      <p>Para acceder a Carreras se debe ingresar previamente al sistema.</p>
      <b><p>Ingresar a Carreras</b><p>
      <p>Seleccionaremos donde donde indica la flecha para ingresar a carreras:</p>
      <img width="660px" height="324" src="../image/manual/carrerasind.png" />
      <br><br>
      <p>Como se aprecia en la imagen, aparecerá las materias pertenecientes a cada carrera que seleccionemos:</p>
      <img width="434px" height="571" src="../image/manual/infcarreras.png" />
      <br>
      </div>
    </div>
  </div>



  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse06" class="btn btn-link btn-block" role="button" style=text-align:left>
        Administración
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
              <h3><b>¿Como acceder a "Administración"? </b></h3>
              <p>Debe ir donde indica la flecha:</p>
              <img width="803px" height="43" src="../image/manual/adm.png" />
              <br><br>
              <p>Nos aparecera tres modulos en administración: Registro de usuario, Panel de administración y Gestionar Usuarios:</p>
              <img width="243px" height="160" src="../image/manual/menuAdmin.png" />
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
                      <p>Para acceder al registro de usuarios, se debe ser Admin, ya que es el único capaz de generar usuarios para el sistema. 
                      Accederemos al registro a través del siguiente el siguiente enlace:
                      http://yii.local/site/register </p>
                      <img width="514px" height="612" src="../image/manual/reg.png" />
                      <br>
                      <br>
                      <ul>
                     <p><b>Campos:</p></b>
                     <li><p><b>Nombre de usuario:</b> &nbsp;Se debe escoger el nombre que se le asignará al usuario que desea registrar al sistema.</p></li>
                     <li><p><b>Email:</b> &nbsp;Se debe escribir el Email del usuario al que se desea registrar al sistema.</p></li>
                     <li><p><b>Instituto:</b>&nbsp;Se debe seleccionar a qué instituto pertenece el usuario. Los institutos disponibles son: Ingeniería, Sociales y Salud.<p></li>
                     <li><p><b>Permisos de usuario:</b>&nbsp;Aquí deberá seleccionar los permisos que tendrá el usuario. Existen tres  tipos de permisos, que son los siguientes:
                      <ul>
                      <li><b><p>Administrador</b></p></li>
                      <li><b><p>Usuario</b></p></li>
                      <li><b><p>Guest</p></b></li>
                      </ul></li>
                      <li><p><b>Contraseña:</b> &nbsp;Se deberá ingresar la contraseña que le asignaremos al el usuario, con un mínimo de 6 y máximo de 16 caracteres.</p></li>
                      <li><p><b>Finalizar registro:</b> &nbsp;Si usted relleno los campos, deberá apretar este botón para finalizar el registro. Le aparecerá la siguiente imagen:</p></li>
                      </ul>
                      <img width="300px" height="189" src="../image/manual/alertreg.png" />
                      <br>
                      <br>
                      <p><b>Nota:</b>&nbsp;Deberá ingresar a el Email del usuario que se registro al sistema, para confirmar su registro.<p>

              </div>
            </div>
          </div>


          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion06" href="#collapseInnerAdmin03" class="btn btn-link btn-block" role="button" style=text-align:left >
              Panel de administración
              </a></h4>
            </div>
            <div id="collapseInnerAdmin03" class="panel-collapse collapse">
              <div class="panel-body">
                
                       <p>En panel de administración usted podrá ver en el inicio algunas estadísticas generales como: el número de usuarios
                        registrados, de carreras, de materias y institutos. Además en la columna izquierda podrá entrar a los paneles de: 
                        aulas, carreras, comisiones, edificios, institutos, materias, notificaciones, recursos y de sedes..</p>
                        <img width="651px" height="258" src="../image/manual/estadistAdmin.png" />
                        <br><br>
                        <h3><b>Paneles</b></h3>
                        <br>
                        <p><b>Panel de aula:</p></b>
                        <img width="797px" height="365" src="../image/manual/panelDeAula.png" />
                        <br><br>
                        <p>En el panel de aulas veremos la lista de todas las aulas que se crearon. Adicionalmente, dispondremos de la opción de “Crear aula”.</p>
                        <br>
                        <p><b>Panel de carrera:</p></b>
                        <img width="695px" height="306" src="../image/manual/panelCarrera.png" />
                        <br><br>
                        <p>En el panel de carreras veremos la lista de todas las carreras que se crearon. Adicionalmente, dispondremos de la opción de “Crear carrera”.</p>
                        <br>
                        <p><b>Panel de comisiones:</p></b>
                        <img width="654px" height="308" src="../image/manual/panelComisiones.png" />
                        <br><br>
                        <p>En el panel de comisiones veremos la lista de todas las comisiones existentes. Además, dispondremos de la opción de “Crear comision”.</p>
                        <br>
                        <p><b>Panel de edificios:</p></b>
                        <img width="608px" height="273" src="../image/manual/panelEdificios.png" />
                        <br><br>
                        <p>En el panel de edificios veremos la lista de todas los edificios que se crearon. Adicionalmente, dispondremos de la opción de “Crear edificio”.</p>
                        <br>

                        <p><b>Panel de institutos:</p></b>
                        <img width="631px" height="227" src="../image/manual/panelInstitutos.png" />
                        <br><br>
                        <p>En el panel de institutos veremos la lista de todas los institutos que se crearon. Adicionalmente, dispondremos de la opción de “Crear instituto”.</p>
                        <br>

                        <p><b>Panel de materias:</p></b>
                        <img width="625px" height="326" src="../image/manual/panelMaterias.png" />
                        <br><br>
                        <p>En el panel de materias veremos la lista de todas los materias que se crearon. Adicionalmente, dispondremos de la opción de “Crear materia”.</p>
                        <br>

                        <p><b>Panel de notificaciones:</p></b>
                        <img width="684px" height="140" src="../image/manual/panelNoti.png" />
                        <br><br>
                        <p>En el panel de notificaciones veremos la lista de notificaciones que enviamos o recibimos.</p>
                        <br>

                        <p><b>Panel de recursos:</p></b>
                        <img width="671px" height="150" src="../image/manual/panelRecursos.png" />
                        <br><br>
                        <p>En el panel de recursos veremos la lista de recursos que se crearon. Adicionalmente, dispondremos de la opción de “Crear recurso”.</p>
                        <br>

                        <p><b>Panel de sedes:</p></b>
                        <img width="668px" height="286" src="../image/manual/panelSedes.png" />
                        <br><br>
                        <p>En el panel de sedes veremos la lista de sedes que se crearon. Adicionalmente, dispondremos de la opción de “Crear sede”.</p>

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

                    
                    <p>Si entramos a gestión de usuarios nos aparecera la siguiente ventana:</p>

                    <img width="815px" height="256" src="../image/manual/gestionDeUsuarios.png" />
                    <br>
                    <br>
                    <p> Si presionamos el botón "editar" de cualquier usuario, nos aparecera el siguiente formulario:</p>
                    <img width="501px" height="463" src="../image/manual/formAdmin.png" />
                    <br><br>
                  <ul>
                 <li><p><b>Campos:</p></b>
                 <li><p><b>Nombre de usuario:</b> &nbsp;Debe ingresar el nombre de usuario que desea cambiar</p></li>
                 <li><p><b>Email:</b> &nbsp;Debe ingresar el correo que desea cambiar para el usuario.</p></li>
                 <li><p><b>Instituto:</b>&nbsp;Debe seleccionar el instituto que desea cambiar del usuario.Los institutos disponibles son: Ingeniería, Sociales y Salud.<p></li>
                 <li><p><b>Rol:</b>&nbsp;Aquí deberá seleccionar el rol que quiera cambiar para el usuario. Existen tres  tipos de roles, que son los siguientes:
                  <ul>
                  <li><b><p>Administrador</b></p></li>
                  <li><b><p>Usuario</b></p></li>
                  <li><b><p>Guest</p></b></li>  
                  </ul></li>        
                   <li><p><b>Guardar:</b>&nbsp;Si usted relleno los campos, deberá apretar este botón para guardar los datos.</p></li>
                  </ul>
                

              </div>
            </div>
          </div>

        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>




 <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseNoti01" class="btn btn-link btn-block" role="button" style=text-align:left>
        Notificaciones
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

                <h3><b><p>Ingresar a Notificaciones</b><p></h3>
                <br>
                <p>Seleccionaremos donde donde indica la flecha para ingresar a Notificaciones:</p>
                <img width="590px" height="101" src="../image/manual/Noti.png" />
                <br><br>
                <p>En notificaciones podremos enviar mensajes a otros usuarios del sistema. Además, se dispondrá de un buzón de notificaciones recibidas y un buzón de notificaciones enviadas.<p>
                <img width="759px" height="113" src="../image/manual/NotiMenu.png" />



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

              <p>Para enviar una notificación nos dirigiremos a donde indica la flecha de la imagen:<p>
              <img width="580px" height="362" src="../image/manual/EnvioNoti.png" />
              <br>
              <ul>
              <b><p>Campos:</p></b>
              <li><p><b>Usuario receptor:</b>&nbsp;Se seleccionará el usuario al que deseamos enviar la notificaciones. Adicionalmente, podremos enviar mensajes a múltiples usuarios o hacer una notificación de difusión.</p></li>
              <li><p><b>Notificación:</b>&nbsp;Se escribirá la notificación que deseamos enviar.</p></li>
              <li><b></p>Botones:</b></p></li>
              <li><p><b>Enviar:</b>&nbsp;Este botón lo seleccionaremos una vez escrita la notificación y elegido el usuario/s receptor/es.</p></li>
              </ul>
              <br>
              <p>Si todo sale correctamente saldra la siguiente alerta:</p>
              <img width="307px" height="173" src="../image/manual/mensajeEnviado.png" />        
                

              </div>
            </div>
          </div>

        </div>

        <!-- Inner accordion ends here -->

      </div>
    </div>
  </div>


  

    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse7" class="btn btn-link btn-block" role="button" style=text-align:left>
       Cambio de contraseña
      </a></h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse">
      <div class="panel-body">

      <h3><b>Cambio de contraseña</b></h3>
      <br>
      <p> Si deseamos cambiar la contraseña debemos ir a la esquina superior izquierda donde se encuentra nuestro nombre de usuario:</p>
      <img width="323px" height="245" src="../image/manual/cambiopw.png" />
      <br>
      <p>Seleccionaremos "Cambiar contraseña" y nos aparecera el siguiente formulario:</p>
      <img width="455px" height="398" src="../image/manual/formpw.png" />
      <br>
      <ul>
      <p>Campos a rellenar:<p>

     <li> <p><b>Contraseña actual:</b>&nbsp; La contraseña que usted tiene actualmente</p></li>
    <li><p><b>Nueva contraseña:</b>&nbsp; La nueva contraseña que desee para su cuenta.</p></li>
    <li> <p><b>Confirmar contraseña:</b>&nbsp; Debe repetir la contraseña nueva.</p></li>
    <li><p><b>Confirmar:</b>&nbsp; Si todo sale bien, luego de apretar este botón, la contraseña se cambia con éxito.</p></li>
    </ul>
<br>

      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse10" class="btn btn-link btn-block" role="button" style=text-align:left>
        Calendar
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
              <p><b>Ir a agenda</b></p>

                <p>Debemos seleccionar el botón “Agenda” del aula que nosotros queramos crear eventos. Se le dirigirá a la siguiente ventana:</p> 
                <img width="512px" height="220" src="../image/manual/ventanaCalendar.png" />
                <br><br>
                <p><b>Botones disponibles:</b></p>
                <ul>
               <li><p><b>Nuevo evento:</b> &nbsp;Si usted selecciona este botón se le direccionará a un formulario.</p></li>
               <li><p><b>Día:</b>&nbsp;Si queremos ver los eventos por día debemos seleccionar este botón.</p></li>
               <li> <p><b>Semana:</b> &nbsp;Si queremos ver los eventos por semana debemos seleccionar este botón.</p></li>
               <li><p><b>Mes:</b>&nbsp;Si queremos ver los eventos por mes seleccionar este botón.</b></li>
                </ul> <br>
           
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
                            <img width="769px" height="347" src="../image/manual/newEvent.png" />
                            <br><br>
                            <p>Una vez hecho esto, nos aparecerá el siguiente formulario:</p>
                            <br>
                            <img width="521px" height="351" src="../image/manual/formEvent.png" />

                            <br><br>
                            <b><p>Campos:</p></b>
                          <ul>
                          <li><p><b>Carrera:</b>&nbsp;Seleccione la carrera </p></li>
                          <li> <p><b>Materia:</b>&nbsp;Seleccione materia correspondiente a la Carrera elegida previamente</p></li>
                          <li> <p><b>Comisión:</b>&nbsp;Seleccione la comisión perteneciente a la Materia elegida previamente</p></li>
                          <li><p><b>Dia:</b> &nbsp;Seleccionar el día (Lun a Sab)</p></li>
                          <li><p><b>Desde las:</b>&nbsp;Seleccione el horario inicial</p></li>
                          <li><p><b>Hasta las:</b>&nbsp;Seleccione el horario final</p></li>                           
                          <li><p><b>Guardar:</b>&nbsp;Una vez que lleno el formulario, seleccione este botón para guardar los datos.</p></li>
                          <li> <p><b>Cerrar: </b>&nbsp;Si desea cancelar el evento que está creando, seleccione este botón.</p></li>
                            </ul>
                            <br>
                            <p>Una vez guardado el evento, usted podrá ver la materia en (Día, Hora y Mes) todo el cuatrimestre:</p>
                            <br>
                            <p><b><h4>Vista de materia por Día</p></b></h4>
                            <br>
                            <p>En la siguiente imagen se puede apreciar la vista paronamica del evento por día:
                            <br><br>
                            <img width="702px" height="314" src="../image/manual/vistaporDia.png" />
                            <br><br>

                            <p><b><h4>Vista de materia por Semana</p></b></h4>
                            <br>
                            <p>En la siguientes imágenes se apreciara una vista panorámica por semana, de la planificación que usted eligió para dicha materia. Podrá observar que la materia estará cada semana en el mismo horario elegido.</p>
                            <br>
                            <p><b>Ejemplo:&nbsp; Semana 19 de noviembre al 24 de noviembre:</p></b> 
                            <br>
                            <img width="686px" height="197" src="../image/manual/vistaSemana01.png" />
                            <br><br>
                            <p><b>Ejemplo:&nbsp; Semana 26 de noviembre al 1 de diciembre:</p></b> 
                            <br>
                            <img width="657px" height="333" src="../image/manual/vistaSemana.png" />
                            <br><br>
                            <h4><p><b>Vista de materia por Mes</p></b></h4>
                            <br>
                            <p>En la próxima imagen verá con más claridad cómo la materia que eligió está planificada en todo el mes, el mismo día.</p>
                            <img width="747px" height="359" src="../image/manual/vistaporMes.png" />
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
</div>
</div>



