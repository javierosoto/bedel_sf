<h1>Elementos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Disponible</th>
      <th>Numero inventario</th>
      <th>Solo udc</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Elementos as $Elemento): ?>
    <tr>
      <td><a href="<?php echo url_for('abm_equipamiento/edit?id='.$Elemento->getId()) ?>"><?php echo $Elemento->getId() ?></a></td>
      <td><?php echo $Elemento->getDescripcion() ?></td>
      <td><?php echo $Elemento->getDisponible() ?></td>
      <td><?php echo $Elemento->getNumeroInventario() ?></td>
      <td><?php echo $Elemento->getSoloUdc() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('abm_equipamiento/new') ?>">New</a>
