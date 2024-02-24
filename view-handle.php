<?php
require_once 'database.php';
require_once 'user-repository.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$userRepository = new UserRepository($con);
$user = $userRepository->getUserById($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="form-horizontal" action="view-handle.php" >
    <div class="form-group">
        <label class="col-sm-2 control-label">ID : <?php echo "{$user['citizen_id']}" ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"> Name : <?php echo "{$user['name']}" ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"> National ID : <?php echo "{$user['national_id']}" ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"> Date Dose : <?php echo "{$user['date_dose']}" ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"> Phone Number : <?php echo "{$user['phone_number']}" ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"> Location Name : <?php echo "{$user['location_name']}" ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"> Vaccine Name : <?php echo "{$user['vaccine_name']}" ?></label>
    </div>
    

  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default "><a href="admin_table.php">Back</a></button>
    </div>
  </div>
</form>
</body>
</html>
