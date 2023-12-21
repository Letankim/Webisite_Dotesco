<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Account.php";
class AccountDao {
    private static $db;

    public function __construct()
    {
        self::$db = new ConnectionAdmin();
    }

    function getAll() {
        $sql = "SELECT * FROM tbl_account ORDER BY role DESC, id DESC";
        $resultSQL = self::$db->getAll($sql);
        $accounts = array();
        foreach ($resultSQL as $row) {
            $accounts[] = $this->account($row);
        }
        return $accounts;
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

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_account WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->account($row);
        }
        return null;
    }

    function getAccountByUsername($username) {
        $username = str_replace("'", "''", $username);
        $params = array(':username' => $username);
        $sql = "SELECT * FROM tbl_account WHERE username=:username";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->account($row);
        }
        return null;
    }

    function isExistAccountForget($username, $email) {
        $email = str_replace("'", "''", $email);
        $username = str_replace("'", "''", $username);
        $params = array(
            ":username"=>$username,
            ":email"=>$email
        );
        $sql = "SELECT * FROM tbl_account WHERE username = :username AND email = :email";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->account($row);
        }
        return null;
    }


    function addNew($account) {
        $username = $account->getUsername();
        $password =$account->getPassword();
        $email = $account->getEmail();
        $phone = $account->getPhone();
        $params = array(
            ":username"=>$username,
            ":password"=>$password,
            ":email"=>$email,
            ":phone"=>$phone,
            ":status"=>$account->getStatus(),
            ":role"=>$account->getRole(),
            ":createAt"=>$account->getCreateAt()
        );
        $sql = "INSERT INTO tbl_account (username, email, phone,password, role, status, createAt) 
        VALUES (:username, :email,:phone,:password,:role, :status, :createAt)";
        return self::$db->insert($sql, $params);
    }

    function update($account) {
        $password = $account->getPassword();
        $email = $account->getEmail();
        $phone = $account->getPhone();
        $params = array(
            ":id"=>$account->getId(),
            ":password"=>$password,
            ":email"=>$email,
            ":phone"=>$phone,
            ":status"=>$account->getStatus(),
            ":role"=>$account->getRole(),
            ":modifiedAt"=>$account->getModifiedAt()
        );
        $sql = "UPDATE tbl_account SET password=:password, email=:email,phone=:phone ,role =:role,status=:status, modifiedAt=:modifiedAt WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function updatePersonal($account) {
        $password = $account->getPassword();
        $email = $account->getEmail();
        $phone = $account->getPhone();
        $params = array(
            ":id"=>$account->getId(),
            ":password"=>$password,
            ":email"=>$email,
            ":phone"=>$phone,
            ":avatar"=>$account->getAvatar(),
            ":modifiedAt"=>$account->getModifiedAt()
        );
        $sql = "UPDATE tbl_account SET password=:password, email=:email,phone=:phone,
        avatar=:avatar, modifiedAt=:modifiedAt WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_account WHERE id=:id AND role=0";
        return self::$db->delete($sql, $params);
    }
    function deleteAll() {
        $sql = "DELETE FROM tbl_account WHERE role=0";
        return self::$db->delete($sql);
    }

    function updatePassword($id,$password) {
        $params = array(
            ":id"=>$id,
            ":password"=>$password
        );
        $sql = "UPDATE tbl_account SET password = :password WHERE id=:id";
        return self::$db->update($sql, $params);
    }
}
?>