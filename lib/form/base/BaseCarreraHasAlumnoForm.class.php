<?php

/**
 * CarreraHasAlumno form base class.
 *
 * @method CarreraHasAlumno getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCarreraHasAlumnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'carrera_id' => new sfWidgetFormInputHidden(),
      'alumno_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'carrera_id' => new sfValidatorPropelChoice(array('model' => 'Carrera', 'column' => 'id', 'required' => false)),
      'alumno_id'  => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('carrera_has_alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CarreraHasAlumno';
  }


}
