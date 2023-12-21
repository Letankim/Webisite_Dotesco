<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Account.php";
class AccountDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function account($row) {
        $id = $row['id'];
        $username = $row['username'];
        $password = $row['password'];
        $email = $row['email'];
        $phone = $row['phone'];
        $avatar = $row['avatar'];
        $createAt = $row['createAt'];
        $modifiedAt = $row['modifiedAt'];
        $status = $row['status'];
        $role = $row['role'];
        $account = new Account($id, $username, $password, $email, $phone,$avatar, $createAt, $modifiedAt, $status, $role);
        return $account;
    }

    function getUserById($id) {
        $sql = "SELECT * FROM tbl_account WHERE id = :id";
        $params = array(":id"=>$id);
        $row = self::$db->get_one($sql,$params);
        if($row) {
            return $this->account($row);
        }
        return null;
    }
    
    function isExistAccount($username) {
        $username = str_replace("'","''",$username);
        $params = array(":username"=>$username);
        $sql = "SELECT * FROM tbl_account WHERE username = :username";
        $row = self::$db->get_one($sql,$params);
        if($row) {
            return $this->account($row);
        }
        return null;
    }

    function isExistAccountForget($username, $email) {
        $params = array(
            ":email" => $email,
            ":username" => $username
        );
        $sql = "SELECT * FROM tbl_account WHERE username = :username AND email = :email";
        $row = self::$db->get_one($sql,$params);
        if($row) {
            return $this->account($row);
        }
        return null;
    }

    function addNew($account) {
        $params = array(
            ":username" => $account->getUsername(),
            ":email" => $account->getEmail(),
            ":password" => $account->getPassword(),
            ":role" => 0,
            ":status" => 1,
            ":createAt" => $account->getCreateAt()
        );
        $sql = "INSERT INTO tbl_account (username, email,password, role, status, createAt)
         VALUES (:username, :email, :password, :role, :status, :createAt)";
        return self::$db->insert($sql, $params);
    }

    function updatePassword($id,$password) {
        $params = array(
            ":id" => $id,
            ":password" => $password
        );
        $sql = "UPDATE tbl_account SET password = :password WHERE id = :id";
        return self::$db->update($sql, $params);
    }

    function updatePersonal($id,$email, $phone) {
        $params = array(
            ":id" => $id,
            ":phone" => $phone,
            ":email"=>$email
        );
        $sql = "UPDATE tbl_account SET phone = :phone, email=:email WHERE id = :id";
        return self::$db->update($sql, $params);
    }
}
?>