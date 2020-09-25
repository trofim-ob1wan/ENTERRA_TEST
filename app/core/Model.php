<?php
namespace app\core;

use app\core\db\Db;

abstract class Model
{
    public $db;
    public $date;
	
    public function __construct()
    {
        $this->db = new Db;
        date_default_timezone_set('Asia/Novosibirsk');
        $this->date = date("Y-m-d H:i:s"); 
    }
}