<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('abm_materia/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('abm_materia/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'abm_materia/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre_materia']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_materia']->renderError() ?>
          <?php echo $form['nombre_materia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_inicio_cursada']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_inicio_cursada']->renderError() ?>
          <?php echo $form['fecha_inicio_cursada'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_fin_cursada']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_fin_cursada']->renderError() ?>
          <?php echo $form['fecha_fin_cursada'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['carrera_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['carrera_id']->renderError() ?>
          <?php echo $form['carrera_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
