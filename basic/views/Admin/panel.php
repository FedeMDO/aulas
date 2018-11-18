<?php

use yii\helpers\Html;

$this->title = 'Panel de administracion';
?>

<div class='panel panel_a'>
    <h3 style="color:black; border-bottom: 1px solid white; text-align:left;">Panel general de administracion:</h3>

    <ul style="list-style-type:disc; margin-left:15px;">
        <li>Aulas:</li>
            <a href='/aula/index' style='margin-left:20px;'>Panel de aulas</a>
        <li>Carreras:</li>
            <a href='/carrera/index' style='margin-left:20px;'>Panel de carreras</a>
        <li>Comisiones:</li>
            <a href='/comision/index' style='margin-left:20px;'>Panel de comisiones</a>
        <li>Edificios:</li>
            <a href='/edificio/index' style='margin-left:20px;'>Panel de edificios</a>
        <li>Institutos:</li>
            <a href='/instituto/index' style='margin-left:20px;'>Panel de institutos</a>
        <li>Materias:</li>
            <a href='/materia/index' style='margin-left:20px;'>Panel de materias</a>
        <li>Notificaciones:</li>
            <a href='/notificacion/index' style='margin-left:20px;'>Panel de notificaciones</a>
        <li>Recursos:</li>
            <a href='/recurso/index' style='margin-left:20px;'>Panel de recursos</a>
        <li>Sedes:</li>
            <a href='/sede/index' style='margin-left:20px;'>Panel de sedes</a>
    </ul>
</div>