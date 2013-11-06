<h1>Cargos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion cargo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Cargos as $Cargo): ?>
    <tr>
      <td><a href="<?php echo url_for('cargo/edit?id='.$Cargo->getId()) ?>"><?php echo $Cargo->getId() ?></a></td>
      <td><?php echo $Cargo->getDescripcionCargo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('cargo/new') ?>">New</a>
