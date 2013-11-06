<?php

/**
 * Elemento form base class.
 *
 * @method Elemento getObject() Returns the current form's model object
 *
 * @package    bedel
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseElementoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'descripcion'       => new sfWidgetFormInputText(),
      'disponible'        => new sfWidgetFormInputCheckbox(),
      'numero_inventario' => new sfWidgetFormInputText(),
      'solo_udc'          => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descripcion'       => new sfValidatorString(array('max_length' => 50)),
      'disponible'        => new sfValidatorBoolean(),
      'numero_inventario' => new sfValidatorString(array('max_length' => 50)),
      'solo_udc'          => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Elemento', 'column' => array('numero_inventario')))
    );

    $this->widgetSchema->setNameFormat('elemento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Elemento';
  }


}
