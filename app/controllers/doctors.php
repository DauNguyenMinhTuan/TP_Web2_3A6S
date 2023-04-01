<?php

require_once(APPROOT . "app/librairie/Controller.php");

class Doctors extends Controller
{
    private $doctorModel;

    public function __construct()
    {
        if (isLoggedIn()) {
            redirect('page/index');
        }
        $this->loadModel("doctor");
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $loginInfo = [
                "email" => $_POST["email"],
                "password" => $_POST["password"],
                "email_error" => false,
                "password_error" => false
            ];

            $email = $loginInfo["email"];
            if($this->model->fetchDoctorByEmail($email)){
                $password = $loginInfo["password"];
                if($this->model->login($email, $password)){
                    $this->createDoctorSession(compact('result')["result"]);
                }
                else{
                    echo "Wrong password";
                    $loginInfo["password_error"] = true;
                    $this->render("/doctor/login", $data = []);
                }
            }
            else{
                echo "Wrong email";
                $loginInfo["email_error"] = true;
                $this->render("/doctor/login", $data = []);
            }
        }else{
            $this->render("/doctor/login", $data = []);
        }
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $regInfo = [
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
                "gender" => $_POST["gender"] == "male",
                "specialist" => $_POST["specialist"],
                "create_at" => getdate()
            ];
            if($this->model->create($regInfo)){
                redirect("doctors/login");
            }
        }
        else{
            $this->render("/doctor/register", $data = []);
        }
    }

    function createDoctorSession($doctor)
    {
        $_SESSION['doctor_id'] = $doctor['id'];
        $_SESSION['doctor_name'] = $doctor['name'];
        $_SESSION['doctor_email'] = $doctor['email'];
        redirect('pages/index');
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['doctor_id']);
        redirect('doctors/login');
    }
}

?>