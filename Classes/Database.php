<?php
class Database extends Connection
{
    public function connect()
    {
        return mysqli_connect('localhost', 'nmk', '123456', 'contact');
    }
}
