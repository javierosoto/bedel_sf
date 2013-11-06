<?php

/**
 * TemasDados form base class.
 *
 * @method TemasDados getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTemasDadosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'fecha_hora'  => new sfWidgetFormDateTime(),
      'tema'        => new sfWidgetFormInputText(),
      'comision_id' => new sfWidgetFormPropelChoice(array('model' => 'Comision', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'fecha_hora'  => new sfValidatorDateTime(),
      'tema'        => new sfValidatorString(array('max_length' => 100)),
      'comision_id' => new sfValidatorPropelChoice(array('model' => 'Comision', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('temas_dados[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TemasDados';
  }


}
