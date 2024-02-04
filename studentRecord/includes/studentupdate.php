<!-- Footer -->
<?php include "../header.php"?>

<?php
   // checking if the variable is set or not and if set adding the set data value to variable userid
   if(isset($_GET['user_id']))
    {
      $userid = $_GET['user_id']; 
    }
      // SQL query to select all the data from the table where id = $userid
      $query="SELECT * FROM user WHERE id = $userid ";
      $view_users= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_users))
        {
          $id = $row['id'];                
          $firstname = $row['firstname'];        
          $lastname = $row['lastname'];        
          $gender = $row['gender'];        
          $email = $row['email'];         
          $number = $row['number'];
          
        }
 
    //Processing form data when form is submitted
    if(isset($_POST['update'])) 
    {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      
      // SQL query to update the data in user table where the id = $userid 
      $query = "UPDATE user SET firstname = '{$firstname}' , lastname = '{$lastname}', gender = '{$gender}', email = '{$email}' , number= '{$number}' WHERE id = $userid";
      $update_user = mysqli_query($conn, $query);
      echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";
    }             
?>

<h1 class="text-center">Update User Details</h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="firstname" >first name</label>
        <input type="text" name="firstname" class="form-control" value="<?php echo $firstname  ?>">
      </div>

      <div class="form-group">
        <label for="lastname" >last name</label>
        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname  ?>">
      </div>

      <div class="form-group">
        <label for="gender" >gender</label>
        <input type="text" name="gender" class="form-control" value="<?php echo $gender  ?>">
      </div>

      <div class="form-group">
        <label for="email" >Email ID</label>
        <input type="text" name="email"  class="form-control" value="<?php echo $email  ?>">
      </div>
        <small id="emailHelp" class="form-text text-muted"></small>
    
      <div class="form-group">
        <label for="number" >number</label>
        <input type="text" name="number"  class="form-control" value="<?php echo $number  ?>">
      </div>    

      <div class="form-group">
         <input type="submit"  name="update" class="btn btn-primary mt-2" value="update">
      </div>
    </form>    
  </div>

    <!-- a BACK button to go to the home page -->
    <div class="container text-center mt-5">
      <a href="students.php" class="btn btn-warning mt-5"> Back </a>
    <div>
