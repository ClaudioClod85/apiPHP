<?php

namespace db;
use db\DbPDO;

class Db{
    protected $conn;

    public static function create($options){
        if(!array_key_exists('dsn', $options)){
            $dsn = '';
            switch($options['driver']){
                case 'mysqli':
                    //imposto il dns per la connessione a mysqli

                    //restituisco istanza mysqli
                    break;
                case 'PDO':
                    $options['dsn'] = "mysql:host=" .$options['host'].";dbname=".$options['database'];
                    return DbPDO::getInstance($options);
                    break;
            }

        }
    }
}
?>
