<?php
    function connect() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "appliancestore";
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function getAll($sql) {
        $result = array();
        try {
            $conn = connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } catch(Exception $e) {
            try {
                $date= date('Y/m/d');
                $myLogger = fopen('./Log/error_admin.log', 'a');
                $content = "Admin: select all (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
        return $result;
    }

    function getByID($sql) {
        $result = array();
        try {
            $conn = connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        } catch(Exception $e) {
            try {
                $date= date('Y/m/d');
                $myLogger = fopen('./Log/error_admin.log', 'a');
                $content = "Admin: select one by id (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
        return $result;
    }

    function insert($sql) {
        try {
            $conn = connect();
            $conn->exec($sql);
        } catch(Exception $e) {
            try {
                $date= date('Y/m/d');
                $myLogger = fopen('./Log/error_admin.log', 'a');
                $content = "Admin: insert data (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
    }

    function update($sql) {
        try {
            $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        } catch(Exception $e) {
            try {
                $date= date('Y/m/d');
                $myLogger = fopen('./Log/error_admin.log', 'a');
                $content = "Admin: update data (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
    }

    function delete($sql) {
        try {
            $conn = connect();
            $conn->exec($sql);
        } catch(Exception $e) {
            try {
                $date= date('Y/m/d');
                $myLogger = fopen('./Log/error_admin.log', 'a');
                $content = "Admin: delete data (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
    }
?>