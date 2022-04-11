<?php
class Permissions
{
    private $conn = null;
    private $admin = null;
    private $permissions = array();

    function __construct($con, $admin)
    {
        $this->conn = $con;
        $this->admin = $admin;
        $this->permissions = $admin->getPermissions();
    }
}
