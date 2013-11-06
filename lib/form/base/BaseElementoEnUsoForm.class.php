<?php

/**
 * ElementoEnUso form base class.
 *
 * @method ElementoEnUso getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseElementoEnUsoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'hora_fecha_retiro'  => new sfWidgetFormDateTime(),
      'hora_fecha_entrega' => new sfWidgetFormDateTime(),
      'elemento_id'        => new sfWidgetFormPropelChoice(array('model' => 'Elemento', 'add_empty' => false)),
      'persona_id'         => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'hora_fecha_retiro'  => new sfValidatorDateTime(array('required' => false)),
      'hora_fecha_entrega' => new sfValidatorDateTime(array('required' => false)),
      'elemento_id'        => new sfValidatorPropelChoice(array('model' => 'Elemento', 'column' => 'id')),
      'persona_id'         => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('elemento_en_uso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ElementoEnUso';
  }


}
