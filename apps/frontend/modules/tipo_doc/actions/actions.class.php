<?php

/**
 * tipo_doc actions.
 *
 * @package    bedel
 * @subpackage tipo_doc
 * @author     Your name here
 */
class tipo_docActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Tipodocs = TipodocQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TipodocForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TipodocForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Tipodoc = TipodocQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Tipodoc, sprintf('Object Tipodoc does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipodocForm($Tipodoc);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Tipodoc = TipodocQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Tipodoc, sprintf('Object Tipodoc does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipodocForm($Tipodoc);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Tipodoc = TipodocQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Tipodoc, sprintf('Object Tipodoc does not exist (%s).', $request->getParameter('id')));
    $Tipodoc->delete();

    $this->redirect('tipo_doc/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Tipodoc = $form->save();

      $this->redirect('tipo_doc/edit?id='.$Tipodoc->getId());
    }
  }
}
