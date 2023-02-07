<?php

namespace App\Repository;

use PDO;

class Database
{
    public static function connect()
    {
        return new PDO('mysql:host=localhost;dbname=blog', 'lexa', 'lexasama');
    }
}
