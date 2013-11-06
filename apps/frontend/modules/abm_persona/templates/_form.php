<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('abm_persona/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('abm_persona/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'abm_persona/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nro_doc']->renderLabel() ?></th>
        <td>
          <?php echo $form['nro_doc']->renderError() ?>
          <?php echo $form['nro_doc'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ape_nom']->renderLabel() ?></th>
        <td>
          <?php echo $form['ape_nom']->renderError() ?>
          <?php echo $form['ape_nom'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']->renderError() ?>
          <?php echo $form['direccion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_nac']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_nac']->renderError() ?>
          <?php echo $form['fecha_nac'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sexo_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['sexo_id']->renderError() ?>
          <?php echo $form['sexo_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tipo_doc_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo_doc_id']->renderError() ?>
          <?php echo $form['tipo_doc_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
