<?php
class MainClass
{
    public function db_connect()
    {
        require_once "db_conn.php";
        $connection = new mysqli($sname, $uname, $password, $db_name);
        return $connection;
    }

    public function singin($site)
    {
        if ($_SESSION['zalogowany']==FALSE){
            header('Location: '.$site);
        }
    }
}
?>