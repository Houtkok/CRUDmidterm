<?php
require_once 'database.php';
require_once 'user-repository.php';
$userRepository = new UserRepository($con);
$userData = $userRepository->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin</title>
    <style>
        div{
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        a{
            display: inline;
            text-decoration: none;
            color: white;
        }
        a:hover{
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <button type="button" class="btn btn-success"><a href="index_database_crud.php">Create</a></button>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>National ID</th>
                    <th>Date Dose</th>
                    <th>Phone Number</th>
                    <th>Location</th>
                    <th>Vaccine</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // print_r($userData);
                foreach ($userData as $user) {
                    echo "<tr>";
                    echo "<td>  {$user['citizen_id']}               </td>";
                    echo "<td>  {$user['name']}             </td>";
                    echo "<td>  {$user['national_id']}      </td>";
                    echo "<td>  {$user['date_dose']}        </td>";
                    echo "<td>  {$user['phone_number']}              </td>";
                    echo "<td>  {$user['location_name']}         </td>";
                    echo "<td>  {$user['vaccine_name']}          </td>";
                    echo "<td>
                                <a class='btn btn-info'     href='view-handle.php?id=   {$user['vr_id']}'>View</a>
                                <a class='btn btn-primary'  href='edit-handle.php?id=   {$user['vr_id']}'>Edit</a>
                                <a class='btn btn-danger'   href='delete-handle.php?id=  {$user['vr_id']}'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
