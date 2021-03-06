<?php

/**
 * CidesaExistValidator: Modificacion del PropelExistValidator para adaptarlo
 * a las necesidades del Roraima
 *
 * @package    Roraima
 * @subpackage validators
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class CidesaExistValidator extends sfValidator
{
  public function execute(&$value, &$error)
  {
    $className  = ucfirst(strtolower($this->getParameter('class'))).'Peer';
    $columnName = call_user_func(array($className, 'translateFieldName'), $this->getParameter('column'), BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
    if ($this->getParameter('column2')){
        $columnName2 = call_user_func(array($className, 'translateFieldName'), $this->getParameter('column2'), BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
        $get2=$this->getParameterHolder()->get('value2');
        $value2 = $this->getContext()->getRequest()->getParameter($get2);

    $c = new Criteria();
    $c->add($columnName, $value);
    $c->add($columnName2, $value2);
    }else{

    $c = new Criteria();
    $c->add($columnName, $value);
    }


    $object = call_user_func(array($className, 'doSelectOne'), $c);


    if (count($object)>0)
    {
       return true;
    }else{
       $error = $this->getParameter('unique_error');
    }

    return false;
  }

  /**
   * Initialize this validator.
   *
   * @param sfContext The current application context.
   * @param array   An associative array of initialization parameters.
   *
   * @return bool true, if initialization completes successfully, otherwise false.
   */
  public function initialize($context, $parameters = null)
  {
    // initialize parent
    parent::initialize($context);

    // set defaults
    $this->setParameter('unique_error', 'Uniqueness error');

    $this->getParameterHolder()->add($parameters);

    // check parameters
    if (!$this->getParameter('class'))
    {
      throw new sfValidatorException('The "class" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    if (!$this->getParameter('column'))
    {
      throw new sfValidatorException('The "column" parameter is mandatory for the sfPropelUniqueValidator validator.');
    }

    return true;
  }
}
