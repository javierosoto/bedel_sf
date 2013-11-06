<?php

/**
 * abm_alumno actions.
 *
 * @package    bedel
 * @subpackage abm_alumno
 * @author     Your name here
 */
class abm_alumnoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Alumnos = AlumnoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AlumnoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AlumnoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Alumno = AlumnoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Alumno, sprintf('Object Alumno does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlumnoForm($Alumno);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Alumno = AlumnoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Alumno, sprintf('Object Alumno does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlumnoForm($Alumno);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Alumno = AlumnoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Alumno, sprintf('Object Alumno does not exist (%s).', $request->getParameter('id')));
    $Alumno->delete();

    $this->redirect('abm_alumno/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Alumno = $form->save();

      $this->redirect('abm_alumno/edit?id='.$Alumno->getId());
    }
  }
}
