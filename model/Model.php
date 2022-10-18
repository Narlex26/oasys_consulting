<?php

abstract class Model
{
    private static $bdd;

    // INSTANCIE LA CONNEXION A LA BDD
    private static function $setBdd()
    {
        self::$bdd = new PDO('mysql:host=localhost;dbname=oasys_consulting;charset=utf8',
        'root', '');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // RECUPERE LA CONNEXION A LA BDD
    protected function getBdd()
    {
        if(self::$bdd == null)
            self::setBdd();
        return self::$bdd;
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = self::$bdd->prepare('SELECT * FROM' .table. 'ORDER BY id desc');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    public function
}