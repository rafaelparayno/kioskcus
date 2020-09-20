<?php

class User
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }


    public function getData($table = 'users')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE username  != 'admin'");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function deleteUser($userid)
    {
        $result = $this->db->con->query("DELETE FROM users WHERE users_id  = {$userid}");

        echo $userid;
    }


    public function confirmUser($sno, $ead, $password)
    {


        $crppypass =  password_hash($password, PASSWORD_DEFAULT);

        $params = array(
            'username' => "'{$ead}'",
            'password' => "'{$crppypass}'",
            'userole' => 2,
            'acc_id' => "'{$sno}'",
        );


        $result = $this->insertData($params);
        if ($result) {
            $_SESSION['user'] = $ead;
            $_SESSION['id'] = $sno;
            $_SESSION['lvl'] = 2;



            // header("Location:" . $_SERVER['PHP_SELF']);
            header("Location:" . './pages/dashboard.php');
        }
    }

    public function addToUsers($username, $password)
    {

        $crppypass =  password_hash($password, PASSWORD_DEFAULT);
        $params = array(
            'username' => "'{$username}'",
            'password' => "'{$crppypass}'",
        );

        $this->insertData($params);
    }


    public function insertData($params = null, $table = "users")
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


    public function login($username, $password)
    {
        if ($this->db->con != null) {

            $args = $this->get_pwd_from_info($username);

            $passwordfromdb = $args['password'];


            if (password_verify($password, $passwordfromdb)) {

                $_SESSION['user'] = $username;
                $_SESSION['id'] = $args['acc_id'];
                $_SESSION['lvl'] = $args['userole'];
                header("Location:" . './pages/dashboard.php');
            }
        }
    }

    public function resetPassword($userid)
    {
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];
        $crppypass =  password_hash($rand, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = '{$crppypass}' WHERE user_id = {$userid}";

        $this->db->con->query($sql);
        //   echo $sql;
        // echo $rand . ' ' . $crppypass;
        return $rand;
    }

    private function get_pwd_from_info($username)
    {
        $result = $this->db->con->query("SELECT * FROM users WHERE username = '{$username}' ");
        $args = mysqli_fetch_array($result);

        return $args;
    }
}
