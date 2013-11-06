<?php

/**
 * cargo actions.
 *
 * @package    bedel
 * @subpackage cargo
 * @author     Your name here
 */
class cargoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Cargos = CargoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CargoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CargoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Cargo = CargoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Cargo, sprintf('Object Cargo does not exist (%s).', $request->getParameter('id')));
    $this->form = new CargoForm($Cargo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Cargo = CargoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Cargo, sprintf('Object Cargo does not exist (%s).', $request->getParameter('id')));
    $this->form = new CargoForm($Cargo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Cargo = CargoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Cargo, sprintf('Object Cargo does not exist (%s).', $request->getParameter('id')));
    $Cargo->delete();

    $this->redirect('cargo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Cargo = $form->save();

      $this->redirect('cargo/edit?id='.$Cargo->getId());
    }
  }
}
