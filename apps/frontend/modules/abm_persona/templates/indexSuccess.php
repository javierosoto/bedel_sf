<h1>Personas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nro doc</th>
      <th>Ape nom</th>
      <th>Direccion</th>
      <th>Fecha nac</th>
      <th>Email</th>
      <th>Sexo</th>
      <th>Tipo doc</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Personas as $Persona): ?>
    <tr>
      <td><a href="<?php echo url_for('abm_persona/edit?id='.$Persona->getId()) ?>"><?php echo $Persona->getId() ?></a></td>
      <td><?php echo $Persona->getNroDoc() ?></td>
      <td><?php echo $Persona->getApeNom() ?></td>
      <td><?php echo $Persona->getDireccion() ?></td>
      <td><?php echo $Persona->getFechaNac() ?></td>
      <td><?php echo $Persona->getEmail() ?></td>
      <td><?php echo $Persona->getSexoId() ?></td>
      <td><?php echo $Persona->getTipoDocId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('abm_persona/new') ?>">New</a>
