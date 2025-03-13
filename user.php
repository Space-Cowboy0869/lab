<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create User
    public function createUser($name, $email) {
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $name, $email);
        return $stmt->execute();
    }

    // Read Users
    public function getUsers() {
        $sql = "SELECT * FROM users";
        return $this->conn->query($sql);
    }

    // Update User
    public function updateUser($id, $name, $email) {
        $sql = "UPDATE users SET name=?, email=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

    // Delete User
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
