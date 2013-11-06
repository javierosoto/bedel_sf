<?php

/**
 * Fichaje form base class.
 *
 * @method Fichaje getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFichajeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'fecha_hora_entrada' => new sfWidgetFormDateTime(),
      'fecha_hora_salida'  => new sfWidgetFormDateTime(),
      'observacion'        => new sfWidgetFormInputText(),
      'comision_id'        => new sfWidgetFormPropelChoice(array('model' => 'Comision', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'fecha_hora_entrada' => new sfValidatorDateTime(array('required' => false)),
      'fecha_hora_salida'  => new sfValidatorDateTime(array('required' => false)),
      'observacion'        => new sfValidatorString(array('max_length' => 140)),
      'comision_id'        => new sfValidatorPropelChoice(array('model' => 'Comision', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('fichaje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fichaje';
  }


}
