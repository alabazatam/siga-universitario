<?php


abstract class BaseNphisconOld extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $codcon;


	
	protected $fecnom;


	
	protected $monto;


	
	protected $codcat;


	
	protected $codpar;


	
	protected $codescuela;


	
	protected $codniv;


	
	protected $codtipgas;


	
	protected $nomcon;


	
	protected $numrec;


	
	protected $cantidad;


	
	protected $fecnomdes;


	
	protected $especial = '';


	
	protected $fecnomespdes;


	
	protected $fecnomesphas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getFecnom($format = 'Y-m-d')
  {

    if ($this->fecnom === null || $this->fecnom === '') {
      return null;
    } elseif (!is_int($this->fecnom)) {
            $ts = adodb_strtotime($this->fecnom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnom] as date/time value: " . var_export($this->fecnom, true));
      }
    } else {
      $ts = $this->fecnom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCodescuela()
  {

    return trim($this->codescuela);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodtipgas()
  {

    return trim($this->codtipgas);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getNumrec($val=false)
  {

    if($val) return number_format($this->numrec,2,',','.');
    else return $this->numrec;

  }
  
  public function getCantidad($val=false)
  {

    if($val) return number_format($this->cantidad,2,',','.');
    else return $this->cantidad;

  }
  
  public function getFecnomdes($format = 'Y-m-d')
  {

    if ($this->fecnomdes === null || $this->fecnomdes === '') {
      return null;
    } elseif (!is_int($this->fecnomdes)) {
            $ts = adodb_strtotime($this->fecnomdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnomdes] as date/time value: " . var_export($this->fecnomdes, true));
      }
    } else {
      $ts = $this->fecnomdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEspecial()
  {

    return trim($this->especial);

  }
  
  public function getFecnomespdes($format = 'Y-m-d')
  {

    if ($this->fecnomespdes === null || $this->fecnomespdes === '') {
      return null;
    } elseif (!is_int($this->fecnomespdes)) {
            $ts = adodb_strtotime($this->fecnomespdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnomespdes] as date/time value: " . var_export($this->fecnomespdes, true));
      }
    } else {
      $ts = $this->fecnomespdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecnomesphas($format = 'Y-m-d')
  {

    if ($this->fecnomesphas === null || $this->fecnomesphas === '') {
      return null;
    } elseif (!is_int($this->fecnomesphas)) {
            $ts = adodb_strtotime($this->fecnomesphas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnomesphas] as date/time value: " . var_export($this->fecnomesphas, true));
      }
    } else {
      $ts = $this->fecnomesphas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODNOM;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODCAR;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODCON;
      }
  
	} 
	
	public function setFecnom($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnom !== $ts) {
      $this->fecnom = $ts;
      $this->modifiedColumns[] = NphisconOldPeer::FECNOM;
    }

	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphisconOldPeer::MONTO;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODCAT;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODPAR;
      }
  
	} 
	
	public function setCodescuela($v)
	{

    if ($this->codescuela !== $v) {
        $this->codescuela = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODESCUELA;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODNIV;
      }
  
	} 
	
	public function setCodtipgas($v)
	{

    if ($this->codtipgas !== $v) {
        $this->codtipgas = $v;
        $this->modifiedColumns[] = NphisconOldPeer::CODTIPGAS;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = NphisconOldPeer::NOMCON;
      }
  
	} 
	
	public function setNumrec($v)
	{

    if ($this->numrec !== $v) {
        $this->numrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphisconOldPeer::NUMREC;
      }
  
	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphisconOldPeer::CANTIDAD;
      }
  
	} 
	
	public function setFecnomdes($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnomdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnomdes !== $ts) {
      $this->fecnomdes = $ts;
      $this->modifiedColumns[] = NphisconOldPeer::FECNOMDES;
    }

	} 
	
	public function setEspecial($v)
	{

    if ($this->especial !== $v || $v === '') {
        $this->especial = $v;
        $this->modifiedColumns[] = NphisconOldPeer::ESPECIAL;
      }
  
	} 
	
	public function setFecnomespdes($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnomespdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnomespdes !== $ts) {
      $this->fecnomespdes = $ts;
      $this->modifiedColumns[] = NphisconOldPeer::FECNOMESPDES;
    }

	} 
	
	public function setFecnomesphas($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnomesphas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnomesphas !== $ts) {
      $this->fecnomesphas = $ts;
      $this->modifiedColumns[] = NphisconOldPeer::FECNOMESPHAS;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NphisconOldPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->codcar = $rs->getString($startcol + 2);

      $this->codcon = $rs->getString($startcol + 3);

      $this->fecnom = $rs->getDate($startcol + 4, null);

      $this->monto = $rs->getFloat($startcol + 5);

      $this->codcat = $rs->getString($startcol + 6);

      $this->codpar = $rs->getString($startcol + 7);

      $this->codescuela = $rs->getString($startcol + 8);

      $this->codniv = $rs->getString($startcol + 9);

      $this->codtipgas = $rs->getString($startcol + 10);

      $this->nomcon = $rs->getString($startcol + 11);

      $this->numrec = $rs->getFloat($startcol + 12);

      $this->cantidad = $rs->getFloat($startcol + 13);

      $this->fecnomdes = $rs->getDate($startcol + 14, null);

      $this->especial = $rs->getString($startcol + 15);

      $this->fecnomespdes = $rs->getDate($startcol + 16, null);

      $this->fecnomesphas = $rs->getDate($startcol + 17, null);

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating NphisconOld object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NphisconOldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NphisconOldPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NphisconOldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NphisconOldPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NphisconOldPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = NphisconOldPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisconOldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getCodcon();
				break;
			case 4:
				return $this->getFecnom();
				break;
			case 5:
				return $this->getMonto();
				break;
			case 6:
				return $this->getCodcat();
				break;
			case 7:
				return $this->getCodpar();
				break;
			case 8:
				return $this->getCodescuela();
				break;
			case 9:
				return $this->getCodniv();
				break;
			case 10:
				return $this->getCodtipgas();
				break;
			case 11:
				return $this->getNomcon();
				break;
			case 12:
				return $this->getNumrec();
				break;
			case 13:
				return $this->getCantidad();
				break;
			case 14:
				return $this->getFecnomdes();
				break;
			case 15:
				return $this->getEspecial();
				break;
			case 16:
				return $this->getFecnomespdes();
				break;
			case 17:
				return $this->getFecnomesphas();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphisconOldPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getCodcon(),
			$keys[4] => $this->getFecnom(),
			$keys[5] => $this->getMonto(),
			$keys[6] => $this->getCodcat(),
			$keys[7] => $this->getCodpar(),
			$keys[8] => $this->getCodescuela(),
			$keys[9] => $this->getCodniv(),
			$keys[10] => $this->getCodtipgas(),
			$keys[11] => $this->getNomcon(),
			$keys[12] => $this->getNumrec(),
			$keys[13] => $this->getCantidad(),
			$keys[14] => $this->getFecnomdes(),
			$keys[15] => $this->getEspecial(),
			$keys[16] => $this->getFecnomespdes(),
			$keys[17] => $this->getFecnomesphas(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisconOldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setCodcon($value);
				break;
			case 4:
				$this->setFecnom($value);
				break;
			case 5:
				$this->setMonto($value);
				break;
			case 6:
				$this->setCodcat($value);
				break;
			case 7:
				$this->setCodpar($value);
				break;
			case 8:
				$this->setCodescuela($value);
				break;
			case 9:
				$this->setCodniv($value);
				break;
			case 10:
				$this->setCodtipgas($value);
				break;
			case 11:
				$this->setNomcon($value);
				break;
			case 12:
				$this->setNumrec($value);
				break;
			case 13:
				$this->setCantidad($value);
				break;
			case 14:
				$this->setFecnomdes($value);
				break;
			case 15:
				$this->setEspecial($value);
				break;
			case 16:
				$this->setFecnomespdes($value);
				break;
			case 17:
				$this->setFecnomesphas($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphisconOldPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecnom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcat($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodescuela($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodniv($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodtipgas($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNomcon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumrec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCantidad($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecnomdes($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEspecial($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecnomespdes($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecnomesphas($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NphisconOldPeer::DATABASE_NAME);

		if ($this->isColumnModified(NphisconOldPeer::CODNOM)) $criteria->add(NphisconOldPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NphisconOldPeer::CODEMP)) $criteria->add(NphisconOldPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NphisconOldPeer::CODCAR)) $criteria->add(NphisconOldPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NphisconOldPeer::CODCON)) $criteria->add(NphisconOldPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NphisconOldPeer::FECNOM)) $criteria->add(NphisconOldPeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(NphisconOldPeer::MONTO)) $criteria->add(NphisconOldPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NphisconOldPeer::CODCAT)) $criteria->add(NphisconOldPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NphisconOldPeer::CODPAR)) $criteria->add(NphisconOldPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(NphisconOldPeer::CODESCUELA)) $criteria->add(NphisconOldPeer::CODESCUELA, $this->codescuela);
		if ($this->isColumnModified(NphisconOldPeer::CODNIV)) $criteria->add(NphisconOldPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NphisconOldPeer::CODTIPGAS)) $criteria->add(NphisconOldPeer::CODTIPGAS, $this->codtipgas);
		if ($this->isColumnModified(NphisconOldPeer::NOMCON)) $criteria->add(NphisconOldPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NphisconOldPeer::NUMREC)) $criteria->add(NphisconOldPeer::NUMREC, $this->numrec);
		if ($this->isColumnModified(NphisconOldPeer::CANTIDAD)) $criteria->add(NphisconOldPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NphisconOldPeer::FECNOMDES)) $criteria->add(NphisconOldPeer::FECNOMDES, $this->fecnomdes);
		if ($this->isColumnModified(NphisconOldPeer::ESPECIAL)) $criteria->add(NphisconOldPeer::ESPECIAL, $this->especial);
		if ($this->isColumnModified(NphisconOldPeer::FECNOMESPDES)) $criteria->add(NphisconOldPeer::FECNOMESPDES, $this->fecnomespdes);
		if ($this->isColumnModified(NphisconOldPeer::FECNOMESPHAS)) $criteria->add(NphisconOldPeer::FECNOMESPHAS, $this->fecnomesphas);
		if ($this->isColumnModified(NphisconOldPeer::ID)) $criteria->add(NphisconOldPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NphisconOldPeer::DATABASE_NAME);

		$criteria->add(NphisconOldPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setFecnom($this->fecnom);

		$copyObj->setMonto($this->monto);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodescuela($this->codescuela);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodtipgas($this->codtipgas);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setNumrec($this->numrec);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setFecnomdes($this->fecnomdes);

		$copyObj->setEspecial($this->especial);

		$copyObj->setFecnomespdes($this->fecnomespdes);

		$copyObj->setFecnomesphas($this->fecnomesphas);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new NphisconOldPeer();
		}
		return self::$peer;
	}

} 