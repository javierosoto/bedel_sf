<?php

/**
 * Persona form base class.
 *
 * @method Persona getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nro_doc'     => new sfWidgetFormInputText(),
      'ape_nom'     => new sfWidgetFormInputText(),
      'direccion'   => new sfWidgetFormInputText(),
      'fecha_nac'   => new sfWidgetFormDate(),
      'email'       => new sfWidgetFormInputText(),
      'sexo_id'     => new sfWidgetFormPropelChoice(array('model' => 'Sexo', 'add_empty' => false)),
      'tipo_doc_id' => new sfWidgetFormPropelChoice(array('model' => 'TipoDoc', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nro_doc'     => new sfValidatorString(array('max_length' => 10)),
      'ape_nom'     => new sfValidatorString(array('max_length' => 100)),
      'direccion'   => new sfValidatorString(array('max_length' => 100)),
      'fecha_nac'   => new sfValidatorDate(),
      'email'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'sexo_id'     => new sfValidatorPropelChoice(array('model' => 'Sexo', 'column' => 'id')),
      'tipo_doc_id' => new sfValidatorPropelChoice(array('model' => 'TipoDoc', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Persona', 'column' => array('ape_nom'))),
        new sfValidatorPropelUnique(array('model' => 'Persona', 'column' => array('email'))),
        new sfValidatorPropelUnique(array('model' => 'Persona', 'column' => array('nro_doc', 'tipo_doc_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }


}
