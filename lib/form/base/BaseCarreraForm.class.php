<?php

/**
 * Carrera form base class.
 *
 * @method Carrera getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCarreraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'nombre_carrera'          => new sfWidgetFormInputText(),
      'carrera_has_alumno_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Alumno')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre_carrera'          => new sfValidatorString(array('max_length' => 30)),
      'carrera_has_alumno_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Alumno', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('carrera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Carrera';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['carrera_has_alumno_list']))
    {
      $values = array();
      foreach ($this->object->getCarreraHasAlumnos() as $obj)
      {
        $values[] = $obj->getAlumnoId();
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
    $c->add(CarreraHasAlumnoPeer::CARRERA_ID, $this->object->getPrimaryKey());
    CarreraHasAlumnoPeer::doDelete($c, $con);

    $values = $this->getValue('carrera_has_alumno_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CarreraHasAlumno();
        $obj->setCarreraId($this->object->getPrimaryKey());
        $obj->setAlumnoId($value);
        $obj->save($con);
      }
    }
  }

}
