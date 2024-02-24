<?php 
require_once 'database.php';
require_once 'user-repository.php';
// Lo = Location & Vac = vaccine
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $dataLo = new UserRepository($con);
    $locationAll = $dataLo ->readLocation();
}
if($_SERVER['REQUEST_METHOD']=== 'GET'){
    $dataVac = new UserRepository($con);
    $vaccineAll = $dataVac ->readVaccine();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form{
            border: 1px solid black;
            border-radius: 5px;
            padding: 60px;
            margin: 40px;
        }
    </style>
</head>
<body>
    <form class="form-inline" action="form-handler.php" method="POST">
        <div class="form-group">
            <label for="name"> Name : </label>
            <input type="text" class="form-control" id="name " name="name" required>
        </div><br>
        
        <div class="form-group">
            <label for="national_id"> National ID : </label>
            <input type="text" class="form-control" id="national_id" name="national_id" required>
        </div><br>

        <div class="form-group">
            <label for="date_dose"> Date Dose : </label>
            <input type="date" class="form-control" id="date_dose" name="date_dose" required>
        </div><br>

        <div class="form-group">
            <label for="phone_number"> Phone Number : </label>
            <input type="phone_number" class="form-control" id="phone_number" name="phone_number" required>
        </div><br>
        
        <div class="form-group">
            <label for="location"> Location : </label>
            <select id="location" name="location">
                <?php foreach($locationAll as $lo){
                    echo "<option value={$lo["id"]}> {$lo["location_name"]} </option>";
                }
                ?>
            </select>
        </div><br>

        <div class="form-group">
            <label for="vaccine"> Vaccine : </label>
            <select id="vaccine" name="vaccine">
                <?php foreach($vaccineAll as $vac){
                    echo "<option value={$vac["id"]}> {$vac["vaccine_name"]} </option>";
                }
                ?>
            </select>
        </div><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
