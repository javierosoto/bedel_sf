<?php

/**
 * abm_comision actions.
 *
 * @package    bedel
 * @subpackage abm_comision
 * @author     Your name here
 */
class abm_comisionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Comisions = ComisionQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ComisionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ComisionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Comision = ComisionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Comision, sprintf('Object Comision does not exist (%s).', $request->getParameter('id')));
    $this->form = new ComisionForm($Comision);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Comision = ComisionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Comision, sprintf('Object Comision does not exist (%s).', $request->getParameter('id')));
    $this->form = new ComisionForm($Comision);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Comision = ComisionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Comision, sprintf('Object Comision does not exist (%s).', $request->getParameter('id')));
    $Comision->delete();

    $this->redirect('abm_comision/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Comision = $form->save();

      $this->redirect('abm_comision/edit?id='.$Comision->getId());
    }
  }
}
