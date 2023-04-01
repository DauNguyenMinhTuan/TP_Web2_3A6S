<?php

class Doctor
{
    private $id;
    private $name;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fetchDoctorByEmail($email)
    {
        $sql = "SELECT * FROM doctors WHERE email='" . $email . "';";
        $this->db->prepare($sql);
        return $this->db->single();
    }

    public function login($email, $password)
    {
        $data = $this->fetchDoctorbyEmail($email);
        $hash = $data['password'];
        if (password_verify($password, $hash))
            return $data;
        return [];
    }

    public function register($data)
    {
        $sql = "INSERT INTO doctors (name, email, password) VALUES ('" . $data["name"]
            . "', '" . $data["email"] . "', '" . $data["password"] . "');";
        $this->db->prepare($sql);
        $this->db->execute();
    }

    public function getDoctorById($doctor_id){
        $sql = "SELECT * FROM doctors  WHERE id=" . $doctor_id . ";";
        $this->db->prepare($sql);
        return $this->db->single();
    }
}
?>