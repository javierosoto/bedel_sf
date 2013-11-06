<h1>Comisions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion comision</th>
      <th>Materia</th>
      <th>Aula</th>
      <th>Profesor</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Comisions as $Comision): ?>
    <tr>
      <td><a href="<?php echo url_for('abm_comision/edit?id='.$Comision->getId()) ?>"><?php echo $Comision->getId() ?></a></td>
      <td><?php echo $Comision->getDescripcionComision() ?></td>
      <td><?php echo $Comision->getMateriaId() ?></td>
      <td><?php echo $Comision->getAulaId() ?></td>
      <td><?php echo $Comision->getProfesorId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('abm_comision/new') ?>">New</a>
