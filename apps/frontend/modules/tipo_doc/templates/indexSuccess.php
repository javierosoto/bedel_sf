<h1>Tipodocs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Tipodocs as $Tipodoc): ?>
    <tr>
      <td><a href="<?php echo url_for('tipo_doc/edit?id='.$Tipodoc->getId()) ?>"><?php echo $Tipodoc->getId() ?></a></td>
      <td><?php echo $Tipodoc->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tipo_doc/new') ?>">New</a>
