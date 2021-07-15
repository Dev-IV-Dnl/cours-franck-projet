<?php

class ConnexionDb extends PDO
{
    public function __construct()
    {
        parent::__construct(
            "mysql:dbname=mvc;host:localhost:3306;charset:UTF8",
            "root",
            ""
        );

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
