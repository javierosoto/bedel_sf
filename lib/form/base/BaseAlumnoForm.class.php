<?php

/**
 * Alumno form base class.
 *
 * @method Alumno getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAlumnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'persona_id'              => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
      'estado_alumno_id'        => new sfWidgetFormPropelChoice(array('model' => 'EstadoAlumno', 'add_empty' => false)),
      'carrera_has_alumno_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Carrera')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'persona_id'              => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id')),
      'estado_alumno_id'        => new sfValidatorPropelChoice(array('model' => 'EstadoAlumno', 'column' => 'id')),
      'carrera_has_alumno_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Carrera', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumno';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['carrera_has_alumno_list']))
    {
      $values = array();
      foreach ($this->object->getCarreraHasAlumnos() as $obj)
      {
        $values[] = $obj->getCarreraId();
      }

      $this->setDefault('carrera_has_alumno_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCarreraHasAlumnoList($con);
  }

  public function saveCarreraHasAlumnoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['carrera_has_alumno_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CarreraHasAlumnoPeer::ALUMNO_ID, $this->object->getPrimaryKey());
    CarreraHasAlumnoPeer::doDelete($c, $con);

    $values = $this->getValue('carrera_has_alumno_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CarreraHasAlumno();
        $obj->setAlumnoId($this->object->getPrimaryKey());
        $obj->setCarreraId($value);
        $obj->save($con);
      }
    }
  }

}
