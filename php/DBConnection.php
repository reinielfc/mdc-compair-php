<?php

class DBConnection {
    protected $conn;

    function __construct()
    {
        $this->hn = 'localhost';
        $this->un = 'root';
        $this->pw = 'mysql';
        $this->db = 'compair';
        $this->open();
    }

    function getConn()
    {
        return $this->conn;
    }

    function open()
    {
        $this->conn = new mysqli($this->hn, $this->un, $this->pw, $this->db);
    }

    function close()
    {
        $this->conn->close();
    }

    function fetchFieldNames($table_name)
    {
        $sql = "SELECT * FROM $table_name";
        $field_names = array();

        if ($result = $this->conn->query($sql))
        {
            $fields = $result->fetch_fields();

            foreach ($fields as $field)
                array_push($field_names, $field->name);
        }

        return $field_names;
    }

    function insertRecord($table_name, &$data_array)
    {
        $field_names = $this->fetchFieldNames($table_name);
        $new_data = array();

        foreach ($field_names as $name) {
            if (array_key_exists($name, $data_array)) {
                $value = $data_array[$name];

                if ($value == "")
                    $new_data[$name] = "NULL";
                else if (strtolower($value) == "true" ||
                         strtolower($value) == "false")
                    $new_data[$name] = $value;
                else
                    $new_data[$name] = "'".$value."'";
            } else {
                $new_data[$name] = "NULL";
            }
        }

        $fields = implode(", ", array_keys($new_data));
        $values = implode(", ", $new_data);

        $sql = "INSERT INTO $table_name ($fields) VALUES ($values)";
        $this->conn->query($sql) or die("Failed Query!");
    }

}

?>