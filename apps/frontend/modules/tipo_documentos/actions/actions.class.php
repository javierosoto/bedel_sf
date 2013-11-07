<?php

/**
 * tipo_documentos actions.
 *
 * @package    bedel
 * @subpackage tipo_documentos
 * @author     Your name here
 */
class tipo_documentosActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->TipoDocs = TipoDocQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TipoDocForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TipoDocForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $TipoDoc = TipoDocQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoDoc, sprintf('Object TipoDoc does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipoDocForm($TipoDoc);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $TipoDoc = TipoDocQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoDoc, sprintf('Object TipoDoc does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipoDocForm($TipoDoc);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $TipoDoc = TipoDocQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoDoc, sprintf('Object TipoDoc does not exist (%s).', $request->getParameter('id')));
    $TipoDoc->delete();

    $this->redirect('tipo_documentos/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $TipoDoc = $form->save();

      $this->redirect('tipo_documentos/edit?id='.$TipoDoc->getId());
    }
  }
}
