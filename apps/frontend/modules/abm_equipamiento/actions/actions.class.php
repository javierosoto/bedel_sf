<?php

/**
 * abm_equipamiento actions.
 *
 * @package    bedel
 * @subpackage abm_equipamiento
 * @author     Your name here
 */
class abm_equipamientoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Elementos = ElementoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ElementoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ElementoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Elemento = ElementoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Elemento, sprintf('Object Elemento does not exist (%s).', $request->getParameter('id')));
    $this->form = new ElementoForm($Elemento);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Elemento = ElementoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Elemento, sprintf('Object Elemento does not exist (%s).', $request->getParameter('id')));
    $this->form = new ElementoForm($Elemento);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Elemento = ElementoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Elemento, sprintf('Object Elemento does not exist (%s).', $request->getParameter('id')));
    $Elemento->delete();

    $this->redirect('abm_equipamiento/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Elemento = $form->save();

      $this->redirect('abm_equipamiento/edit?id='.$Elemento->getId());
    }
  }
}
