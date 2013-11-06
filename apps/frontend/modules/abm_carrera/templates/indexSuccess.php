<h1>Carreras List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre carrera</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Carreras as $Carrera): ?>
    <tr>
      <td><a href="<?php echo url_for('abm_carrera/edit?id='.$Carrera->getId()) ?>"><?php echo $Carrera->getId() ?></a></td>
      <td><?php echo $Carrera->getNombreCarrera() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('abm_carrera/new') ?>">New</a>
