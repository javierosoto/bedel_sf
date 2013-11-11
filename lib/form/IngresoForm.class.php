<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IngresoForm
 *
 * @author cjmjb
 */
class IngresoForm extends sfForm
{
    public function configure() {
        
        $this->setWidget(array(
            'numero_documento' => new sfWidgetFormInputText()));
        
    }    
    
}
