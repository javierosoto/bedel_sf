<?php

/**
 * Profesor form base class.
 *
 * @method Profesor getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProfesorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'cargo_id'   => new sfWidgetFormPropelChoice(array('model' => 'Cargo', 'add_empty' => false)),
      'persona_id' => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'cargo_id'   => new sfValidatorPropelChoice(array('model' => 'Cargo', 'column' => 'id')),
      'persona_id' => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('profesor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profesor';
  }


}
