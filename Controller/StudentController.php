<?php
declare(strict_types=1);


class StudentController
{
    public function render()
    {
        $view = "View/StudentView.php";
        $connection = new Connection();
        $showStudents = $connection->displayStudent();
        $classes = $connection->displayClass();
        if (isset($_POST['addNewStudent'])) {
            require "View/RegistrationStudentView.php";
        }
        if (isset($_POST['confirm'])) {
            $StudentName = $_POST["StudentName"];
            $StudentEmail = $_POST["StudentEmail"];
            $classID = $_POST["class"];
            if ((!empty($StudentName) && (!empty($StudentEmail)))) {
                $student = new Student($StudentName, $StudentEmail, intval($classID));
                $connection->insertStudent($student);
                header('Location: '.$_SERVER['PHP_SELF']."?AllStudents=");

            }
        }

        if (isset($_GET["student"])) {
            $studentId = $_GET["student"];
            $profileStudent = $connection->profileStudent($studentId);
            $studentClassId = $profileStudent['student_class'];
            if ($studentClassId !== null) {
                $getClassName = $connection->getClassName($studentClassId);
                $getTeacherName = $connection->getTeacherName($studentClassId);
                $getClassName = $getClassName['class_name'];
                $getTeacherName = $getTeacherName['teacher_name'];
            } else {
                $getClassName = "";
                $getTeacherName = "";

            }

            $view = "View/StudentProfileView.php";

            if (isset($_POST["editStudentProfile"])) {
                require "View/UpdateStudentView.php";
            }
            if (isset($_POST["confirmStudentUpdate"])) {
                $studentName = $_POST["StudentName"];
                $studentEmail = $_POST["StudentEmail"];
                if ((!empty($studentName) && (!empty($studentEmail)))) {
                    $updateStudent = $connection->updateStudent($studentName, $studentEmail, intval($studentId));
                    header('Location: '.$_SERVER['PHP_SELF']."?student=$studentId");

                }
            }
        }

        require $view;
    }
}