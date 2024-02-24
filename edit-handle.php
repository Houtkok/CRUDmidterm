<?php
require_once 'database.php';
require_once 'user-repository.php';


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
var_dump($id);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $id > 0) {
    $userRepository = new UserRepository($con);
    $user = $userRepository->getUserById($id);
    var_dump($user);
    $locationAll = $userRepository ->readLocation();
    $vaccineAll = $userRepository ->readVaccine();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'name'          => isset($_POST['name']) ? $_POST['name'] : '',
        'national_id'   => isset($_POST['national_id']) ? $_POST['national_id'] : '',
        'date_dose'     => isset($_POST['date_dose']) ? $_POST['date_dose'] : '',
        'phone_number'  => isset($_POST['phone_number']) ? $_POST['phone_number'] : '',
        'location'      => isset($_POST['location']) ? $_POST['location'] : '',
        'vaccine'       => isset($_POST['vaccine']) ? $_POST['vaccine'] : '',
    ];

    $userRepository = new UserRepository($con);
    $user = $userRepository->getUserById($id);
    var_dump($user);
    if ($user) {
        foreach ($updatedData as $key => $value) {
            $user[$key] = $value;
        }
        $success = $userRepository->update( $user['citizen_id'],
                                            $user['vr_id'],
                                            $user['name'],
                                            $user['national_id'],
                                            $user['date_dose'],
                                            $user['phone_number'],
                                            $user['location'],
                                            $user['vaccine']
                                            );
        if ($success) {
            header("Location: admin_table.php");
            exit();
        } else {
            echo "Update failed";
        }
    } else {
        echo "User not found";
    }
}
include 'edit-form.php';
?>




