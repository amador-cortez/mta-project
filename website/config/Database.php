<?php
namespace Pluralis\Website\Config;

class Database{
	public static function connect(){
		$db = new \mysqli('localhost', '', '', '');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}