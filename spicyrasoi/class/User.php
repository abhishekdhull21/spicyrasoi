<?php
class User
{
    private $con;
    private $userid;
    public $username;
    public $mobile;
    public $email;
    public $sex;
    public $dob;
    public $address;
    function __construct($con)
    {
        $this->con = $con;
    }
    function getUserid($token)
    {
        $sql = "SELECT user_id as userid FROM logined_user WHERE token = '$token'";
        if ($result = mysqli_query($this->con, $sql)) {
            if ($result->num_rows > 0) {
                $this->userid =   mysqli_fetch_assoc($result)['userid'];
                return array("success" => true, "data" => $this->userid);
            }
        }
        return array("success" => false, "data" => mysqli_error($this->con));
    }
    function fetchUser($token)
    {
        $res = $this->getUserid($token);
        if ($res["success"] == true) {
            $sql = "SELECT user_id as userid,
        user_name as username,
        user_email as email,
        user_sex as sex,
        user_dob as dob,
        user_address as address,
        user_mobile as mobile FROM users WHERE user_id = '$this->userid'";
            if ($result = mysqli_query($this->con, $sql)) {
                if ($result->num_rows > 0)
                    $row =  mysqli_fetch_assoc($result);
                $this->userid = $row['userid'];
                $this->username = $row['username'];
                $this->email = $row['email'];
                $this->dob = $row['dob'];
                $this->address = $row['address'];
                $this->sex = $row['sex'];
                $this->mobile = $row["mobile"];
                return array("success" => true, "data" => $row);
            }
            return array("success" => false, "data" => mysqli_error($this->con));
        }
        return array("success" => false, "data" => $res["data"]);
    }
}
