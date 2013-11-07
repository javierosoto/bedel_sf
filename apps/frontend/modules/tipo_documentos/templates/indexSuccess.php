<h1>TipoDocs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($TipoDocs as $TipoDoc): ?>
    <tr>
      <td><a href="<?php echo url_for('tipo_documentos/edit?id='.$TipoDoc->getId()) ?>"><?php echo $TipoDoc->getId() ?></a></td>
      <td><?php echo $TipoDoc->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tipo_documentos/new') ?>">New</a>
