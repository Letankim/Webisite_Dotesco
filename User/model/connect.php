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
            try {
                $date= date('Y/m/d');
                $myLogger = fopen('./User/Log/error.log', 'a');
                $content = "User: Connect (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
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
                $myLogger = fopen('./User/Log/error.log', 'a');
                $content = "User: SELECT (".$e->getMessage().") ".$date."\n";
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
        } catch(PDOException $e) {
            try {
                $date= date('Y/m/d');
                $myLogger = fopen('./User/Log/error.log', 'a');
                $content = "User: get one by id (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(PDOException $error) {

            }
        }
        return $result;
    }

    function insert($sql) {
        try {
            $conn = connect();
            $conn->exec($sql);
        } catch(PDOException $e) {
            try {
                $date= date('Y/m/d');
                $myLogger = fopen('./User/Log/error.log', 'a');
                $content = "User: sign-up (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(PDOException $error) {

            }
        }
    }

    function update($sql) {
        try {
            $conn = connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch(PDOException $e) {
            try {
                $myLogger = fopen('./User/Log/error.log', 'a');
                $content = "User: forget password (".$e->getMessage().")\n";
                fwrite($myLogger, $content);
            } catch(PDOException $error) {

            }
        }
    }

    function validationInput($value) {
        $result = "";
        for($i = 0; $i < strlen($value); $i++) {
            if($value[$i] == "'") {
                $result.="''";
            } else {
                $result.=$value[$i];
            }
        }
        return $result;
    }
?>