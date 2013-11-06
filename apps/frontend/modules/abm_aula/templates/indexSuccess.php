<h1>Aulas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion aula</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Aulas as $Aula): ?>
    <tr>
      <td><a href="<?php echo url_for('abm_aula/edit?id='.$Aula->getId()) ?>"><?php echo $Aula->getId() ?></a></td>
      <td><?php echo $Aula->getDescripcionAula() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('abm_aula/new') ?>">New</a>
