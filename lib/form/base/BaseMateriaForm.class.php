<?php

/**
 * Materia form base class.
 *
 * @method Materia getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMateriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'nombre_materia'       => new sfWidgetFormInputText(),
      'fecha_inicio_cursada' => new sfWidgetFormDate(),
      'fecha_fin_cursada'    => new sfWidgetFormDate(),
      'carrera_id'           => new sfWidgetFormPropelChoice(array('model' => 'Carrera', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre_materia'       => new sfValidatorString(array('max_length' => 30)),
      'fecha_inicio_cursada' => new sfValidatorDate(),
      'fecha_fin_cursada'    => new sfValidatorDate(),
      'carrera_id'           => new sfValidatorPropelChoice(array('model' => 'Carrera', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('materia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materia';
  }


}
