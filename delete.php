
<?php include('dbcon.php'); ?>

<?php
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];

    $query = "DELETE FROM `member` WHERE `Id` = '$id'";
    $result = mysqli_query($db->connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($db->connection));
    } else {
        // Redirect to Home.php with a delete success parameter
        header("Location: Home.php?delete_success=true");
        exit(); 
    }
}
?>

