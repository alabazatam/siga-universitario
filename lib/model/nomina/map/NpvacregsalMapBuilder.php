<?php



class NpvacregsalMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacregsalMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('npvacregsal');
		$tMap->setPhpName('Npvacregsal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacregsal_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECHASALIDA', 'Fechasalida', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAENTRADA', 'Fechaentrada', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIADIS', 'Diadis', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('PERINI', 'Perini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PERFIN', 'Perfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIASBONO', 'Diasbono', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('STAVAC', 'Stavac', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 