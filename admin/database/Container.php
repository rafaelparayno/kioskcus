<?php

class Container
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }


    public function getData($table = 'containers')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }


    public function addContainers($conumber, $consignee, $broker, $status)
    {


        $params = array(
            'container_number' => "'{$conumber}'",
            'consignee' => "'{$consignee}'",
            'broker' => "'{$broker}'",
            'status' => "'{$status}'",
        );

        $this->insertData($params);
    }


    public function insertData($params = null, $table = "containers")
    {
        if ($this->db->con != null) {
            if ($params != null) {

                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));


                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);


                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }


    public function deleteCon($conum)
    {
        $this->db->con->query("DELETE FROM containers WHERE container_id  = {$conum}");
    }
}
