<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- in es para que se muestre el panel !-->
<div class="col-md-offset-2 col-md-8 content">
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
      Entrada al sistema (Login)
      </a></h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse ">
      <div class="panel-body">
        <h3><b>¿Como ingresar a la aplicacion? </b></h3>
        <p>Para acceder a la aplicación, el usuario debe de hacer uso de sus credenciales de acceso (usuario o Email y contraseña).</p>
        <p>El acceso se otorgara dirigiendose al el siguiente enlace: http://yii.local/site/login</p>
        <img width="900px" height="400" src="../image/manual/pastedmage0.png" />
        <br>
        <br>
        <p>Una vez ingresado su usuario y contraseña, pulse el botón ingresar para ingresar al sistema. Si todo sale correctamente, aparecerá en el inicio: </p>
        <img width="900px" height="400" src="../image/manual/inicio.png" />
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse2">
      Sedes
      </a></h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->
        <div class="panel-group" id="accordion2">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes2">
                ¿como acceder a sedes?
              </a></h4>
            </div>
            <div id="collapseInnerSedes2" class="panel-collapse collapse">
              <div class="panel-body">
              <br>
                    <p>Para acceder a el módulo de sedes, se debe ingresar previamente al sistema.<p>
                    <h3><b>¿Como acceder a sedes?</b></h3>
                    <p>Para acceder a la aplicación se utilizará el siguiente enlace:</p>
                    <p>http://yii.local/sede/vistav </p>
                    <img width="1000px" height="300" src="../image/manual/vistasedes.png" />
                    <br>
                    <br>
                    <p>En esta vista, nos aparecerá las sedes de la universidad.</p>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes3">
                Crear sedes
              </a></h4>
            </div>
            <div id="collapseInnerSedes3" class="panel-collapse collapse">
              <div class="panel-body">
              <h3><b>Crear sedes</b></h3>
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
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes4">
                Crear comisiones
              </a></h4>
            </div>
            <div id="collapseInnerSedes4" class="panel-collapse collapse">
              <div class="panel-body">
              <h3><b>Crear comisiones</b></h3>
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
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes5">
                Crear materias
              </a></h4>
            </div>
            <div id="collapseInnerSedes5" class="panel-collapse collapse">
              <div class="panel-body">
                <h3><b>Creación de materias</b></h3>
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
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes6">
              Filtrar aulas
              </a></h4>
            </div>
            <div id="collapseInnerSedes6" class="panel-collapse collapse">
              <div class="panel-body">
              <h3><b>Filitrar aulas</b></h3>
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
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerSedes7">
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse3">
        Edificios
      </a></h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseInnerEdificios1">
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
                <img width="1337px" height="682" src="../image/manual/edin.png" />
                <br>

                <p><b></b>&nbsp; Una vez entrada a las sedes estas aparecerán al presionar el boton entrar con el cual se podrá ingresar y ver la lista de edificios. </p>
                <br>
                <img width="1097px" height="523" src="../image/manual/edificios.png" />
                <br>
                <br>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseInnerEdificios2">
              Crear Edificios
              </a></h4>
            </div>
            <div id="collapseInnerEdificios2" class="panel-collapse collapse">
              <div class="panel-body">
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse4">
        Aulas
      </a></h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion4" href="#collapseInnerAulas1">
              ¿Como acceder a "Aulas"?
              </a></h4>
            </div>
            <div id="collapseInnerAulas1" class="panel-collapse collapse in">
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
                <img width="1343px" height="586" src="../image/manual/aula02.png" />
                <br><br>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerAulas2">
                Collapsible Inner Group Item #2
              </a></h4>
            </div>
            <div id="collapseInnerAulas2" class="panel-collapse collapse">
              <div class="panel-body">
                Anim pariatur cliche...
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse5">
        Institutos
      </a></h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseInnerInstitutos1">
                Collapsible Inner Group Item #1
              </a></h4>
            </div>
            <div id="collapseInnerInstitutos1" class="panel-collapse collapse in">
              <div class="panel-body">
                Anim pariatur cliche...
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerInstitutos2">
                Collapsible Inner Group Item #2
              </a></h4>
            </div>
            <div id="collapseInnerInstitutos2" class="panel-collapse collapse">
              <div class="panel-body">
                Anim pariatur cliche...
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse6">
        Carreras
      </a></h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerCarreras1">
                Collapsible Inner Group Item #1
              </a></h4>
            </div>
            <div id="collapseInnerCarreras1" class="panel-collapse collapse in">
              <div class="panel-body">
                Anim pariatur cliche...
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerCarreras2">
                Collapsible Inner Group Item #2
              </a></h4>
            </div>
            <div id="collapseInnerTwo" class="panel-collapse collapse">
              <div class="panel-body">
                Anim pariatur cliche...
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse7">
        Administracion
      </a></h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerAdministracion1">
                Collapsible Inner Group Item #1
              </a></h4>
            </div>
            <div id="collapseInnerAdministracion1" class="panel-collapse collapse in">
              <div class="panel-body">
                Anim pariatur cliche...
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerAdministracion2">
                Collapsible Inner Group Item #2
              </a></h4>
            </div>
            <div id="collapseInnerAdministracion2" class="panel-collapse collapse">
              <div class="panel-body">
                Anim pariatur cliche...
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse8">
        Notificaciones
      </a></h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerNoti1">
                Collapsible Inner Group Item #1
              </a></h4>
            </div>
            <div id="collapseInnerNoti1" class="panel-collapse collapse in">
              <div class="panel-body">
                Anim pariatur cliche...
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerNoti2">
                Collapsible Inner Group Item #2
              </a></h4>
            </div>
            <div id="collapseInnerNoti2" class="panel-collapse collapse">
              <div class="panel-body">
                Anim pariatur cliche...
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse9">
        Cambio de contraseña
      </a></h4>
    </div>
    <div id="collapse9" class="panel-collapse collapse">
      <div class="panel-body">

        <!-- Here we insert another nested accordion -->

        <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerContraseña1">
                Collapsible Inner Group Item #1
              </a></h4>
            </div>
            <div id="collapseInnerOneContraseña1" class="panel-collapse collapse in">
              <div class="panel-body">
                Anim pariatur cliche...
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerContraseña2">
                Collapsible Inner Group Item #2
              </a></h4>
            </div>
            <div id="collapseInnerContraseña2" class="panel-collapse collapse">
              <div class="panel-body">
                Anim pariatur cliche...
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
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse10">
        Calendar
      </a></h4>
    </div>
    <div id="collapse10" class="panel-collapse collapse">
      <div class="panel-body">
 
        <!-- Here we insert another nested accordion -->
        <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerOne">
              ijuhiuh
              </a></h4>
            </div>
            <div id="collapseInnerOne" class="panel-collapse collapse">
              <div class="panel-body">
                contenido1
                </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerTwo">
                yh8h8
              </a></h4>
            </div>
            <div id="collapseInnerTwo" class="panel-collapse collapse">
              <div class="panel-body">
              </div>
            </div>
          </div>
        <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner3">
               uihuhi
              </a></h4>
            </div>
            <div id="collapseInner3" class="panel-collapse collapse ">
              <div class="panel-body">
              </div>
            </div>
          </div>
          <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner4">
                ijubhiuh
              </a></h4>
            </div>
            <div id="collapseInner4" class="panel-collapse collapse ">
              <div class="panel-body">
              </div>
            </div>
          </div>
          <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner5">
                uiuibhuibh
              </a></h4>
            </div>
            <div id="collapseInner5" class="panel-collapse collapse ">
              <div class="panel-body">
              </div>
            </div>
          </div>
          <div class="panel-group" id="accordion2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner6">
              uibuibuib
              </a></h4>
            </div>
            <div id="collapseInner6" class="panel-collapse collapse ">
              <div class="panel-body">
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
