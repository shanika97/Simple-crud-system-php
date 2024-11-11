<?php
include('dbcon.php'); 

if (isset($_POST['add_member'])) {
    $f_name = $_POST['firstName'];
    $l_name = $_POST['lastName'];
    $ds = $_POST['dsDivision'];
    $dob = $_POST['dateOfBirth'];
    $summery = $_POST['summary'];


  // If Summary is "ACCURA", append it to the LastName before saving
  if (strtoupper($summery) == 'ACCURA') {
    $l_name .= ' ACCURA';
}

    if ($f_name == "" || empty($f_name)) {
        header('location:Home.php?message= You need to fill First name !');
        exit();
    } else {
        $query = "INSERT INTO `member` (`firstName`, `lastName`, `dsDivision`, `dateOfBirth`, `summary`) 
                  VALUES ('$f_name', '$l_name', '$ds', '$dob', '$summery')";
        $result = mysqli_query($db->connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($db->connection));
        } else {
            header('location:Home.php?success=true');
            exit();
        }
    }
}


?>