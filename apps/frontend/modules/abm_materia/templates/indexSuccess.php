<h1>Materias List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre materia</th>
      <th>Fecha inicio cursada</th>
      <th>Fecha fin cursada</th>
      <th>Carrera</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Materias as $Materia): ?>
    <tr>
      <td><a href="<?php echo url_for('abm_materia/edit?id='.$Materia->getId()) ?>"><?php echo $Materia->getId() ?></a></td>
      <td><?php echo $Materia->getNombreMateria() ?></td>
      <td><?php echo $Materia->getFechaInicioCursada() ?></td>
      <td><?php echo $Materia->getFechaFinCursada() ?></td>
      <td><?php echo $Materia->getCarreraId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('abm_materia/new') ?>">New</a>
