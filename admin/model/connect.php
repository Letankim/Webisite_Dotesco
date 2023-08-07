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
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();;
    }

    function getByID($sql) {
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        return $result;
    }

    function insert($sql) {
        $conn = connect();
        $conn->exec($sql);
    }

    function update($sql) {
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function delete($sql) {
        $conn = connect();
        $conn->exec($sql);
    }
?>