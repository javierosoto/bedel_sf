<?php

/**
 * abm_condicion_alumno actions.
 *
 * @package    bedel
 * @subpackage abm_condicion_alumno
 * @author     Your name here
 */
class abm_condicion_alumnoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Estadoalumnos = EstadoalumnoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EstadoalumnoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EstadoalumnoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Estadoalumno = EstadoalumnoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Estadoalumno, sprintf('Object Estadoalumno does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstadoalumnoForm($Estadoalumno);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Estadoalumno = EstadoalumnoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Estadoalumno, sprintf('Object Estadoalumno does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstadoalumnoForm($Estadoalumno);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Estadoalumno = EstadoalumnoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Estadoalumno, sprintf('Object Estadoalumno does not exist (%s).', $request->getParameter('id')));
    $Estadoalumno->delete();

    $this->redirect('abm_condicion_alumno/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Estadoalumno = $form->save();

      $this->redirect('abm_condicion_alumno/edit?id='.$Estadoalumno->getId());
    }
  }
}
