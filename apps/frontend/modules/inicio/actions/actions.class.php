<?php

/**
 * inicio actions.
 *
 * @package    bedel
 * @subpackage inicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeIngreso(sfWebReques $request)
  {
      $this->formulario_ingreso = new IngresoForm();
      
  }
  
}
