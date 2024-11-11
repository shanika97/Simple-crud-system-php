<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center bg-primary text-white">
            <h2>Update Member Information</h2>
        </div>
        <div class="card-body">
            <?php
            if(isset($_GET['Id'])){
                $id = $_GET['Id']; 
            }
            
            $query = "SELECT * FROM `member` WHERE `Id` ='$id' ";
            $result = mysqli_query($db->connection, $query); 
            
            if(!$result){
                die("Query failed: " . mysqli_error($db->connection)); 
            } else {
                $row = mysqli_fetch_assoc($result);
            }
            ?> 

            <?php
            if(isset($_POST['update_member'])){
                $f_name = $_POST['firstName'];
                $l_name = $_POST['lastName'];
                $ds = $_POST['dsDivision'];
                $dob = $_POST['dateOfBirth'];
                $summary = $_POST['summary'];

                $query = "UPDATE `member` SET `firstName` = '$f_name', `lastName` = '$l_name', `dsDivision` = '$ds', `dateOfBirth` = '$dob', `summary` = '$summary' WHERE `Id` = '$id'";
                $result = mysqli_query($db->connection, $query); 
                
                if(!$result){
                  die("query failed: " . mysqli_error($db->connection)); 
              } else {
                  // Redirect to Home.php with a success query parameter
                  header("Location: Home.php?update_success=true");
                  exit();
              }
          }
            ?>

            <form id="memberForm" action="update.php?Id=<?php echo $id; ?>" method="post">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $row['firstName']?>" placeholder="Enter first name" required>
                </div>
                
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $row['lastName']?>" placeholder="Enter last name" required>
                </div>

                <div class="mb-3">
                    <label for="dsDivision" class="form-label">DS Division</label>
                    <select class="form-select" id="dsDivision" name="dsDivision" required>
                        <option disabled value="">Choose DS Division</option>
                        <option value="Colombo 1" <?php echo ($row['dsDivision'] == 'Colombo 1') ? 'selected' : ''; ?>>Colombo 1</option>
                        <option value="Colombo 2" <?php echo ($row['dsDivision'] == 'Colombo 2') ? 'selected' : ''; ?>>Colombo 2</option>
                        <option value="Colombo 3" <?php echo ($row['dsDivision'] == 'Colombo 3') ? 'selected' : ''; ?>>Colombo 3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dateOfBirth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="<?php echo $row['dateOfBirth']?>" required>
                </div>

                <div class="mb-3">
                    <label for="summary" class="form-label">Summary</label>
                    <textarea class="form-control" id="summary" rows="3" name="summary" placeholder="Enter summary"><?php echo $row['summary']?></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
                    <input type="submit" class="btn btn-success ms-2" name="update_member" value="Update Member">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
