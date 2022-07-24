<?php
class Admin
{
    private $con = null;
    private $user_id = null;
    private $permissions = array();
    function __construct($con, $user_id)
    {
        $this->con = $con;
        $this->user_id = $user_id;
    }

    public function isAdmin()
    {
        $sql = "SELECT a.permission_id,b.permission,a.status as status FROM admin_permission a, permissions b WHERE a.permission_id = b.id and a.admin = $this->user_id and a.status = 1;
        ";
        $res = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($this->permissions, $row['permission']);
            }
            return true;
        }
        return false;
        // $row = mysqli_fetch_assoc($res);
    }

    public function getPermissions()
    {
        if ($this->permissions == null) $this->isAdmin();
        return $this->permissions;
    }

    public function getAdminType($admin): int
    {
        $sql = "SELECT admin_type FROM users WHERE user_id = $admin";
        $res = $this->con->query($sql);

        // print_r($row);
        return $res->fetch_assoc()['admin_type'];
    }
}
