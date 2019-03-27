<?php

include __DIR__ . '/../config/config.php';

class db {

    public static $connection = NULL;
    public $table = NULL;

    /**
     * constructor
     */
    public function __construct() {
        if (!self::$connection) {
            self::$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            mysqli_set_charset(self::$connection, 'utf8');
        }
    }

    /**
     *
     * @param type $sql
     * @return object mysqli
     */
    public function query($sql) {
        $data = mysqli_query(self::$connection, $sql);
        return $data;
    }

    /**
     *
     * @param string $sql string
     * @return array: list of items
     */
    public function select($sql) {
        $items = array();
        $result = $this->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }
        return $items;
    }


}
