<?php
require_once 'database.php';
require_once 'user-repository.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $national_id = $_POST["national_id"];
    $date_dose = $_POST["date_dose"];
    $phone_number = $_POST["phone_number"];
    $location = $_POST["location"];
    $vaccine = $_POST["vaccine"];

    $error = array();
    if (empty($name) || empty($national_id) || empty($date_dose) || empty($phone_number) || empty($location) || empty($vaccine)) {
        $error[] = "All Field Require !!!";
    } else {
        $userRepository = new UserRepository($con);
        $success = $userRepository->check_cityzen($name, $national_id, $phone_number, $date_dose,  $location, $vaccine);

        if ($success) {
            header("Location: admin_table.php");
            exit();
        } else {
            echo "Fail to insert!";
        }
    }
}
?>
