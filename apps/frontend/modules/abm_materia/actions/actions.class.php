<?php

/**
 * abm_materia actions.
 *
 * @package    bedel
 * @subpackage abm_materia
 * @author     Your name here
 */
class abm_materiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Materias = MateriaQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MateriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MateriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Materia = MateriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Materia, sprintf('Object Materia does not exist (%s).', $request->getParameter('id')));
    $this->form = new MateriaForm($Materia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Materia = MateriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Materia, sprintf('Object Materia does not exist (%s).', $request->getParameter('id')));
    $this->form = new MateriaForm($Materia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Materia = MateriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Materia, sprintf('Object Materia does not exist (%s).', $request->getParameter('id')));
    $Materia->delete();

    $this->redirect('abm_materia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Materia = $form->save();

      $this->redirect('abm_materia/edit?id='.$Materia->getId());
    }
  }
}
