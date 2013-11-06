<?php

/**
 * EstadoAlumno form base class.
 *
 * @method EstadoAlumno getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEstadoAlumnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 30)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'EstadoAlumno', 'column' => array('descripcion')))
    );

    $this->widgetSchema->setNameFormat('estado_alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoAlumno';
  }


}
