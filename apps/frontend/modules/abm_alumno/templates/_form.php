<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('abm_alumno/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('abm_alumno/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'abm_alumno/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['persona_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['persona_id']->renderError() ?>
          <?php echo $form['persona_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['estado_alumno_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['estado_alumno_id']->renderError() ?>
          <?php echo $form['estado_alumno_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['carrera_has_alumno_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['carrera_has_alumno_list']->renderError() ?>
          <?php echo $form['carrera_has_alumno_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
