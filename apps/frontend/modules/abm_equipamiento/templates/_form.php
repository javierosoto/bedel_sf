<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('abm_equipamiento/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('abm_equipamiento/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'abm_equipamiento/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['descripcion']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion']->renderError() ?>
          <?php echo $form['descripcion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['disponible']->renderLabel() ?></th>
        <td>
          <?php echo $form['disponible']->renderError() ?>
          <?php echo $form['disponible'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero_inventario']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_inventario']->renderError() ?>
          <?php echo $form['numero_inventario'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['solo_udc']->renderLabel() ?></th>
        <td>
          <?php echo $form['solo_udc']->renderError() ?>
          <?php echo $form['solo_udc'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
