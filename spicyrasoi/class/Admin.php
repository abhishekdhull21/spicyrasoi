<?php
class Admin
{
    public $con = null;

    function __construct($con)
    {
        $this->con = $con;
    }
    public function getAdminType($admin): int
    {
        $sql = "SELECT admin_type FROM users WHERE user_id = $admin";
        $res = $this->con->query($sql);

        // print_r($row);
        return $res->fetch_assoc()['admin_type'];
    }
}
