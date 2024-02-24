<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Form</title>
</head>
<body>
<form class="form-inline" action="" method="POST">
        <div class="form-group">
            <label for="name">Name : </label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$user['name']; ?>" >
        </div>

        <div class="form-group">
            <label for="national_id"> National ID : </label>
            <input type="text" class="form-control" id="national_id" name="national_id" value="<?=$user['national_id']; ?>" >
        </div>

        <div class="form-group">
            <label for="date_dose"> Date Dose : </label>
            <input type="date_dose" class="form-control" id="date_dose" name="date_dose" value="<?=$user['date_dose']; ?>" >
        </div>

        <div class="form-group">
            <label for="phone_number"> Phone Number : </label>
            <input type="phone_number" class="form-control" id="phone_number" name="phone_number" value="<?=$user['phone_number']; ?>" >
        </div>

        <div class="form-group">
            <label for="location"> Location : </label>
            <select id="location" name="location">
                <?php foreach($locationAll as $lo){
                    $selected = ($lo["id"] == $user["subject"]) ? 'selected' : '';
                    echo "<option value={$lo["id"]}{$selected}> {$lo["location_name"]} </option>";
                }
                ?>
            </select>
        </div><br>

        <div class="form-group">
            <label for="vaccine"> Vaccine : </label>
            <select id="vaccine" name="vaccine">
                <?php foreach($vaccineAll as $vac){
                    $selected = ($sub["id"] == $user["vaccine_name"]) ? 'selected' : '';
                    echo "<option value={$vac["id"]}{$selected}> {$vac["vaccine_name"]} </option>";
                }
                ?>
            </select>
        </div><br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>