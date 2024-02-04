<!-- Header -->
<?php  include "../header.php" ?>

<?php 
  if(isset($_POST['create'])) 
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $number = $_POST['number'];
      
        // SQL query to insert user data into the users table
        $query= "INSERT INTO user(firstname,lastname,gender, email, number) VALUES('{$firstname}','{$lastname}','{$gender}','{$email}','{$number}')";
        $add_user = mysqli_query($conn,$query);
    
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_user) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { echo "<script type='text/javascript'>alert('User added successfully!')</script>";
              }         
    }
?>
<h1 class="text-center">Add User details</h1>
<div class="container">
    <form action="" method="post">
        <!-- Other form fields -->

        <!-- Fetch faculties from the database -->
        <?php
        $faculty_query = "SELECT * FROM faculty";
        $faculty_result = mysqli_query($conn, $faculty_query);
        $faculties = mysqli_fetch_all($faculty_result, MYSQLI_ASSOC);
        ?>

        <!-- Display the drop-down menu for faculty selection -->
        <div class="form-group">
            <label for="faculty">Select Faculty:</label>
            <select name="faculty" class="form-control" required>
                <?php foreach ($faculties as $faculty) : ?>
                    <option value="<?php echo $faculty['id']; ?>">
                        <?php echo $faculty['faculty']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="subject_names">Subject Names:</label>
            <input type="text" name="subject_names" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary mt-2" value="Add">
        </div>
    </form>
</div>

<!-- BACK button to go to the home page -->
<div class="container text-center mt-5">
    <a href="students.php" class="btn btn-warning mt-5">Back</a>
</div>