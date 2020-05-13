<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('C:\webserver\lizmap\prod\release_3_3\lib/jelix-modules/jacl2db/daos/jacl2groupsofuser.dao.xml') > 1582985478)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_jacl2db_Jx_jacl2groupsofuser_Jx_sqlite3 extends jDaoRecordBase {
 public $login;
 public $id_aclgrp;
 public $name;
 public $grouptype;
 public $ownerlogin;
   public function getSelector() { return "jacl2db~jacl2groupsofuser"; }
   public function getProperties() { return cDao_jacl2db_Jx_jacl2groupsofuser_Jx_sqlite3::$_properties; }
   public function getPrimaryKeyNames() { return cDao_jacl2db_Jx_jacl2groupsofuser_Jx_sqlite3::$_pkFields; }
}

class cDao_jacl2db_Jx_jacl2groupsofuser_Jx_sqlite3 extends jDaoFactoryBase {
   protected $_tables = array (
  'ug' => 
  array (
    'name' => 'ug',
    'realname' => 'jacl2_user_group',
    'pk' => 
    array (
      0 => 'login',
      1 => 'id_aclgrp',
    ),
    'fields' => 
    array (
      0 => 'login',
      1 => 'id_aclgrp',
    ),
  ),
  'grp' => 
  array (
    'name' => 'grp',
    'realname' => 'jacl2_group',
    'pk' => 
    array (
      0 => 'id_aclgrp',
    ),
    'fk' => 
    array (
      0 => 'id_aclgrp',
    ),
    'fields' => 
    array (
      0 => 'name',
      1 => 'grouptype',
      2 => 'ownerlogin',
    ),
  ),
);
   protected $_primaryTable = 'ug';
   protected $_selectClause='SELECT ug.login as login, ug.id_aclgrp as id_aclgrp, grp.name as name, grp.grouptype as grouptype, grp.ownerlogin as ownerlogin';
   protected $_fromClause;
   protected $_whereClause=' WHERE  ug.id_aclgrp=grp.id_aclgrp';
   protected $_DaoRecordClassName='cDaoRecord_jacl2db_Jx_jacl2groupsofuser_Jx_sqlite3';
   protected $_daoSelector = 'jacl2db~jacl2groupsofuser';
   public static $_properties = array (
  'login' => 
  array (
    'name' => 'login',
    'fieldName' => 'login',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'string',
    'unifiedType' => 'varchar',
    'table' => 'ug',
    'updatePattern' => '',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'id_aclgrp' => 
  array (
    'name' => 'id_aclgrp',
    'fieldName' => 'id_aclgrp',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'string',
    'unifiedType' => 'varchar',
    'table' => 'ug',
    'updatePattern' => '',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'name' => 
  array (
    'name' => 'name',
    'fieldName' => 'name',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'string',
    'unifiedType' => 'varchar',
    'table' => 'grp',
    'updatePattern' => '',
    'insertPattern' => '',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => false,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'grouptype' => 
  array (
    'name' => 'grouptype',
    'fieldName' => 'grouptype',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'grp',
    'updatePattern' => '',
    'insertPattern' => '',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => false,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'ownerlogin' => 
  array (
    'name' => 'ownerlogin',
    'fieldName' => 'ownerlogin',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'string',
    'unifiedType' => 'varchar',
    'table' => 'grp',
    'updatePattern' => '',
    'insertPattern' => '',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => false,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
);
   public static $_pkFields = array('login','id_aclgrp');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM '.$this->_conn->prefixTable('jacl2_user_group').' AS ug, '.$this->_conn->prefixTable('jacl2_group').' AS grp';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' AND  ug.login'.' = '.$this->_conn->quote($login).' AND ug.id_aclgrp'.' = '.$this->_conn->quote($id_aclgrp).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  login'.' = '.$this->_conn->quote($login).' AND id_aclgrp'.' = '.$this->_conn->quote($id_aclgrp).'';
}
public function insert ($record){
    $query = 'INSERT INTO '.$this->_conn->prefixTable('jacl2_user_group').' (
login,id_aclgrp
) VALUES (
'.($record->login === null ? 'NULL' : $this->_conn->quote2($record->login,false)).', '.($record->id_aclgrp === null ? 'NULL' : $this->_conn->quote2($record->id_aclgrp,false)).'
)';
   $result = $this->_conn->exec ($query);
    return $result;
}
public function update ($record){
     throw new jException('jelix~dao.error.update.impossible',array('jacl2db~jacl2groupsofuser','C:\webserver\lizmap\prod\release_3_3\lib/jelix-modules/jacl2db/daos/jacl2groupsofuser.dao.xml'));
 }
 function getGroupsUser ($login){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' AND  ug.login '.' = '.$this->_conn->quote($login).'';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getPrivateGroup ($login){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' AND  ug.login '.' = '.$this->_conn->quote($login).' AND grp.ownerlogin '.($login === null ? 'IS NULL' : ' = '.$this->_conn->quote2($login,false)).' AND grp.grouptype = 2';
    $__rs = $this->_conn->limitQuery($__query,0,1);
    $this->finishInitResultSet($__rs);
    return $__rs->fetch();
}

}
 return true; }