<?php


class TeacherController
{
    private string $teacherNameError;
    private string $teacherEmailError;
    private string $teacherClassError;
    private string $teacher_Class;

    public function render(array $POST, array $GET)
    {
        $connect=new Connection();
        $connect->openConnection();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['name'])) {
                $this->teacherNameError = "name is required" . '<br>';
            } else {
                $teacher_name = $_POST['name'];
            }

            if (empty($_POST['email'])) {
                $this->teacherEmailError = "email is required" . '<br>';
            } else {
                $teacher_email = $_POST['email'];
            }

            if (empty($_POST['ClassName'])) {
                $this->teacherClassError = " Class name is required" . '<br>';
            } else {
                $teacher_class = $_POST['ClassName'];
            }

            if ($this->teacherNameError== "" && $this->teacherEmailError=="" && $this->teacherClassError=""){
                $teacher=new Teacher($teacher_name,$teacher_email,$teacher_class);
                $connect->insertTeacher($teacher);

            }


            require 'View/TeacherView.php';
        }
    }
}