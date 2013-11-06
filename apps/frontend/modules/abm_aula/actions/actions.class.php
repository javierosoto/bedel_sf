<?php

/**
 * abm_aula actions.
 *
 * @package    bedel
 * @subpackage abm_aula
 * @author     Your name here
 */
class abm_aulaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Aulas = AulaQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AulaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AulaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Aula = AulaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Aula, sprintf('Object Aula does not exist (%s).', $request->getParameter('id')));
    $this->form = new AulaForm($Aula);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Aula = AulaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Aula, sprintf('Object Aula does not exist (%s).', $request->getParameter('id')));
    $this->form = new AulaForm($Aula);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Aula = AulaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Aula, sprintf('Object Aula does not exist (%s).', $request->getParameter('id')));
    $Aula->delete();

    $this->redirect('abm_aula/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Aula = $form->save();

      $this->redirect('abm_aula/edit?id='.$Aula->getId());
    }
  }
}
