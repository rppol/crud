<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
    $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
    $course = (!empty($_POST['course'])) ? $_POST['course'] : '';
    $id = (!empty($_POST['student_id'])) ? $_POST['student_id'] : '';

    if (!empty($id)) {
        // update the record
        $stu_query = "UPDATE `students` SET first_name='" . $first_name . "', last_name='" . $last_name . "',gender='" . $gender . "',email= '" . $email . "', course='" . $course . "' WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "INSERT INTO `students` (first_name, last_name, gender,email, course) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $gender . "', '" . $email . "', '" . $course . "' )";
        $msg = "add";
    }

    $result = mysqli_query($conn, $stu_query);

    if ($result) {
        header('location:/crud/index.php?msg=' . $msg);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $stu_id = $_GET['id'];
    $stu_query = "SELECT * FROM `students` WHERE id='" . $stu_id . "'";
    $stu_res = mysqli_query($conn, $stu_query);
    $results = mysqli_fetch_row($stu_res);
    $first_name = $results[1];
    $last_name = $results[2];
    $gender = $results[3];
    $email = $results[4];
    $course = $results[5];

} else {
    $first_name = "";
    $last_name = "";
    $gender = "";
    $email = "";
    $course = "";
    $stu_id = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body class = "duh">
    <div class = "duh">
   <?php include 'partial/nav.php';?>
    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label font-weight-bold">First Name</label>
                <div class="col-sm-7">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label font-weight-bold">Last Name</label>
                <div class="col-sm-7">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label font-weight-bold">Team</label>
            <div class="col-sm-7">
                <select class="form-control" name="gender" id="gender">
                <option value="">Select Favourite Team</option>
                <option value="Mercedes" <?php if ($gender == 'Mercedes') {echo "selected";}?> >Mercedes</option>
                <option value="Ferrari" <?php if ($gender == 'Ferrari') {echo "selected";}?>>Ferrari</option>
                <option value="McLaren" <?php if ($gender == 'McLaren') {echo "selected";}?>>McLaren</option>
                <option value="Renault" <?php if ($gender == 'Renault') {echo "selected";}?>>Renault</option>

                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label font-weight-bold">Email</label>
                <div class="col-sm-7">
                <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
            <label for="course" class="col-sm-3 col-form-label font-weight-bold">Race Track</label>
            <div class="col-sm-7">
                <select class="form-control" name="course" id="course">
                <option value="">Select Track</option>
                <option value="Monza, Italy" <?php if ($course == 'Monza, Italy') {echo "selected";}?>>Monza, Italy</option>
                <option value="Nurburgring, Germany" <?php if ($course == 'Nurburgring, Germany') {echo "selected";}?>>Nurburgring, Germany</option>
                <option value="COTA, USA" <?php if ($course == 'COTA, USA') {echo "selected";}?>>COTA, USA</option>
                <option value="Albert Park, Australia" <?php if ($course == 'Albert Park, Australia') {echo "selected";}?>>Albert Park, Australia</option>
                <option value="Buddh, India" <?php if ($course == 'Buddh, India') {echo "selected";}?>>Buddh, India</option>
                <option value="Sochi, Russia" <?php if ($course == 'Sochi, Russia') {echo "selected";}?>>Sochi, Russia</option>
                <option value="Istanbul Park, Turkey" <?php if ($course == 'Istanbul Park, Turkey') {echo "selected";}?>>Istanbul Park, Turkey</option>
                <option value="Portimao, Portugal" <?php if ($course == 'Portimao, Portugal') {echo "selected";}?>>Portimao, Portugal</option>
                <option value="Silverstone, Great Britain" <?php if ($course == 'Silverstone, Great Britain') {echo "selected";}?>>Silverstone, Great Britain</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-7">
                <input type="hidden" name="student_id" value="<?php echo $stu_id; ?>">
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</body>
</html>