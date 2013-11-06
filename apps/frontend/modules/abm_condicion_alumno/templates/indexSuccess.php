<h1>Estadoalumnos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Estadoalumnos as $Estadoalumno): ?>
    <tr>
      <td><a href="<?php echo url_for('abm_condicion_alumno/edit?id='.$Estadoalumno->getId()) ?>"><?php echo $Estadoalumno->getId() ?></a></td>
      <td><?php echo $Estadoalumno->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('abm_condicion_alumno/new') ?>">New</a>
