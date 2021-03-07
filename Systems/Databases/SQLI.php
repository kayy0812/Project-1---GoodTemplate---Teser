<?php
namespace Sys\Databases;

use Mysqli;
use Exception;
/**
 * MySQLI Databases
 * @package  Sys\Database\SQLI
 * @version  1.0.5
 */

Class SQLI {

	private static $mysqli;
	private static $query;
	private static $closed = false;

	private $charset = "UTF-8";

	public function __contrust($host, $user, $password, $databases, $port = null) {
		self::$mysqli = new Mysqli($host, $user, $password, $databases, $port);
		if (self::$mysqli->connect_error) {
			throw new Exception("Error: " . self::$mysqli->connect_error, 1);
		}
		self::$mysqli->set_charset($this->charset);
	}

	public function SQLI () {
		return self::$mysqli;
	}

	public function Insert($table, array $data, $name = false)
    {
        $query   = "INSERT INTO $table ";
        $columns = $values = $rows = array();
        foreach ($data as $column => $value) {
            if (is_array($value)) {
                $is_multi = true;
                if (empty($columns)) {
                    $columns = array_keys($value);
                }
                $values[] = array_values($value);
            } else {
                $columns[] = $column;
                $values[]  = ($value == 'NULL' ? 'NULL' : "'$value'");
            }
        }
        $query .= "(" . implode(",", $columns) . ") VALUES ";
        if ($is_multi) {
            foreach ($values as $value) {
                $rows[] = "('" . implode("','", $value) . "')";
            }
            $query .= implode(",", $rows);
        } else {
            $query .= "(" . implode(",", $values) . ")";
        }
        //return $this->query($query, $name);
        echo $query;
    }

	public function closed(){
		if (self::$closed === false) {
			self::$mysqli->close();
			self::$closed = true;
		}
	}

	public function __destrust() {
		$this->closed();
	}
}