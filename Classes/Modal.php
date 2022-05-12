<?php
class Modal extends Database
{
    public $table;
    public $sql;
    function __construct($table)
    {
        $this->table = $table;
        $this->sql = "select * from $this->table";
    }
    public function fetchAll($sql)
    {
        $query = mysqli_query($this->connect(), $sql);
        $rows = [];
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        };
        return $rows;
    }
    public function fetch($sql)
    {
        $query = mysqli_query($this->connect(), $sql);
        return mysqli_fetch_object($query);
    }
    public function all()
    {
        $sql = "select * from $this->table";
        return $this->fetchAll($sql);
    }
    public function get()
    {
        return $this->fetchAll($this->sql);
    }
    public function find($id)
    {
        $sql = "select * from $this->table where id=$id";
        return $this->fetch($sql);
    }
    public function first()
    {
        return $this->fetch($this->sql);
    }
    public function where($column, $opt, $value)
    {
        $this->sql = rtrim($this->sql, ','); //for update sql
        str_contains($this->sql, "where") ? $this->sql .= " && " : $this->sql .= " where ";
        $this->sql .= "$column $opt '$value'";
        return $this;
    }
    public function orWhere($column, $opt, $value)
    {
        str_contains($this->sql, "where") ? $this->sql .= " || " : $this->sql .= " where ";
        $this->sql .= "$column $opt '$value'";
        return $this;
    }
    public function whereIn($column, $valueArray)
    {
        $valueArrayToString = join(',', $valueArray);
        $this->sql .= " where $column in ($valueArrayToString)";
        return $this;
    }
    public function create($data)
    {
        //column
        $column = join(",", array_keys($data));
        //values
        $values = join(',', array_map(function ($i) {
            return "'$i'";
        }, array_values($data)));
        $sql = "insert into $this->table($column) values($values)";
        $conn = $this->connect();
        mysqli_query($conn, $sql);
        return $this->find(mysqli_insert_id($conn));
    }
    public function delete($id)
    {
        $sql = "delete from $this->table where id=$id";
        return mysqli_query($this->connect(), $sql);
    }
    public function update()
    {
        $this->sql = "update $this->table set";
        return $this;
    }
    public function set($column, $value)
    {
        $this->sql .=  " $column='$value',";
        return $this;
    }
    public function save()
    {
        $sql = $this->sql;
        $this->sql = "select * from $this->table";
        return mysqli_query($this->connect(), $sql);
    }
}
