<h1>Alumnos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Estado alumno</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Alumnos as $Alumno): ?>
    <tr>
      <td><a href="<?php echo url_for('abm_alumno/edit?id='.$Alumno->getId()) ?>"><?php echo $Alumno->getId() ?></a></td>
      <td><?php echo $Alumno->getPersonaId() ?></td>
      <td><?php echo $Alumno->getEstadoAlumnoId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('abm_alumno/new') ?>">New</a>
