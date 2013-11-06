<?php

/**
 * Comision form base class.
 *
 * @method Comision getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseComisionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'descripcion_comision' => new sfWidgetFormInputText(),
      'materia_id'           => new sfWidgetFormPropelChoice(array('model' => 'Materia', 'add_empty' => false)),
      'aula_id'              => new sfWidgetFormPropelChoice(array('model' => 'Aula', 'add_empty' => false)),
      'profesor_id'          => new sfWidgetFormPropelChoice(array('model' => 'Profesor', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descripcion_comision' => new sfValidatorString(array('max_length' => 30)),
      'materia_id'           => new sfValidatorPropelChoice(array('model' => 'Materia', 'column' => 'id')),
      'aula_id'              => new sfValidatorPropelChoice(array('model' => 'Aula', 'column' => 'id')),
      'profesor_id'          => new sfValidatorPropelChoice(array('model' => 'Profesor', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('comision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comision';
  }


}
