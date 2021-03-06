<?php

/**
 * bieregactinmd actions.
 *
 * @package    Roraima
 * @subpackage bieregactinmd
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class bieregactinmdActions extends autobieregactinmdActions
{
  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  public function setVars()
  {
    $this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi= Herramientas::ObtenerFormato('Bndefins','lonubi');
    $this->foract = Herramientas::ObtenerFormato('Bndefins','foract');
    $this->lonact=Herramientas::ObtenerFormato('Bndefins','lonact');

  }

  protected function getBnreginmOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $bnreginm = new Bnreginm();
      $this->setVars();
    }
    else
    {
      $bnreginm = BnreginmPeer::retrieveByPk($this->getRequestParameter($id));
      $this->setVars();
      $this->forward404Unless($bnreginm);
    }

    return $bnreginm;
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   if ($this->getRequestParameter('ajax')=='1')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
      $result=array();
      $sql="select a.codact as codigo_nivel,a.DesAct as activo From bndefact a, bndefins b where length(RTrim(a.CodAct))=cast(b.LonAct as integer) and a.codact='".$this->getRequestParameter('codigo')."' and (codact like '1%%' or codact like '01%%') Order By codact";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $dato=$result[0]['codigo_nivel'];
      $dato1=$result[0]['activo'];
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","'.$dato1.'",""]]';
    }
    else
    {
          $javascript="alert('El código no existe...');$('bnreginm_codact').value='';$('bnreginm_desinm').value='';$('bnreginm_codinm').value='';$('bnreginm_codact').focus();";
              $output = '[["javascript","'.$javascript.'",""]]';
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }

   elseif ($this->getRequestParameter('ajax')=='2')
   {
      $cajtexmos=$this->getRequestParameter('cajtexmos');
      $cajtexmos_uno=$this->getRequestParameter('cajtexmos_uno');
      $cajtexmos_dos=$this->getRequestParameter('cajtexmos_dos');
      $cajtexmos_tres=$this->getRequestParameter('cajtexmos_tres');
      $result=array();
      $sql="Select a.ordcom as orden,a.codpro as proveedor, to_char(a.fecord,'dd/mm/yyyy') as fecha, b.nompro as nompro, a.desord from caordcom a, caprovee b  where b.estpro='A' and a.codpro=b.codpro and a.ordcom='".$this->getRequestParameter('codigo')."' order By ordcom";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $dato=$result[0]['orden'];
      $dato1=$result[0]['proveedor'];
      $dato2=$result[0]['nompro'];
      $dato3=$result[0]['fecha'];
      $descripcion = H::getConfApp('descripcion','bienes','bieregactinmd');
      !$descripcion? $descripcion='' : '';
      if($descripcion=='S')
      {
        $cajtexmos_cuatro='bnreginm_desinm';
        $dato4=$result[0]['desord'];
      }else
      {
        $cajtexmos_cuatro='';
        $dato4='';
      }
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexmos_uno.'","'.$dato1.'",""],["'.$cajtexmos_dos.'","'.$dato2.'",""],["'.$cajtexmos_tres.'","'.$dato3.'",""],["'.$cajtexmos_cuatro.'","'.$dato4.'",""]]';
    }
    else
    {
        $javascript="alert('La Orden de Compra no existe...');$('$cajtexmos').value='';$('$cajtexmos_uno').value='';$('$cajtexmos_dos').value='';$('$cajtexmos_tres').value='';$('$cajtexmos').focus();";
              $output = '[["javascript","'.$javascript.'",""]]';
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='3')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
        $dato=BnubibiePeer::getDesubicacion(trim($this->getRequestParameter('codigo')));

    $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='4')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
        $dato=BndisbiePeer::getDesdis_descripcion(trim($this->getRequestParameter('codigo')));

    $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }elseif ($this->getRequestParameter('ajax')=='5')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $c = new Criteria();
    $c->add(BnclafunPeer::CODCLA,$this->getRequestParameter('codigo'));
    $dato=BnclafunPeer::doSelectOne($c);

    if($dato) $output = '[["'.$cajtexmos.'","'.$dato->getDescla().'",""]]';
    else $output = '[["'.$cajtexmos.'","'.Constantes::REGVACIO.'",""]]';

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
    elseif ($this->getRequestParameter('ajax')=='6')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $javascript="";
    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$this->getRequestParameter('codigo'));
    $reg= OpordpagPeer::doSelectOne($c);
    if (!$reg)
     { $javascript="alert('El Numero de Orden de Pago no existe'); $('$cajtexcom').value=''; "; }
    else {
      $numfac=H::getX_vacio('NUMORD', 'Opfactur', 'Numfac', $reg->getNumord());
      $javascript="$('bnreginm_ordrcp').value='$numfac'; ";
    }
    $output = '[["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
  }

    /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bnreginm = $this->getBnreginmOrCreate();

    try{
    $this->updateBnreginmFromRequest();
  }
    catch(Exception $ex){}

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       if (self::$coderror!=-1)
        {
          $err = Herramientas::obtenerMensajeError(self::$coderror);
          $this->getRequest()->setError('',$err);
        }
       }

    return sfView::SUCCESS;

  }

    
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->bnreginm = $this->getBnreginmOrCreate();
        $this->updateBnreginmFromRequest();

        if (!$this->bnreginm->getId())
    self::$coderror=Bienes::validarBnreginm($this->bnreginm);

        if (self::$coderror<>-1)
        {
          return false;
        }
        else return true;

      }else return true;
    }

  protected function saveBnreginm($bnreginm)
  {
    if ($bnreginm->getCodinm()=='########')
    {
      if (Herramientas::getVerCorrelativo('coractinm','bndefins',&$r))
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $sql="select codinm from bnreginm where codinm='".$numero."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
             $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $bnreginm->setCodinm(str_pad($r, 8, '0', STR_PAD_LEFT));
       }
       Herramientas::getSalvarCorrelativo('coractinm','bndefins','RegistroInMuebles',$r,&$msg);
    }

      $bnreginm->save();

}
}
