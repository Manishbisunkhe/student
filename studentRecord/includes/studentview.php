<!-- Header -->
<?php  include '../header.php'?>

<h1 class="text-center">User Details</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
      <tr>
              <th  scope="col">id</th>
              <th  scope="col">first name </th>
              <th  scope="col">last name </th>
              <th  scope="col"> gender</th>
              <th  scope="col"> email </th>
              <th  scope="col"> number </th>
            </tr>  
      </thead>
        <tbody>
          <tr>
               
          <?php
            $query="SELECT * FROM user";               // SQL query to fetch all table data
            $view_users= mysqli_query($conn,$query);    // sending the query to the database

            //  displaying all the data retrieved from the database using while loop
            while($row= mysqli_fetch_assoc($view_users)){
              $id = $row['id'];                
              $firstname = $row['firstname'];        
              $lastname = $row['lastname'];        
              $gender = $row['gender'];        
              $email = $row['email'];         
              $number = $row['number'];        

              echo "<tr >";
              
              echo " <td > {$id}</td>";
              echo " <td > {$firstname}</td>";
              echo " <td > {$lastname}</td>";
              echo " <td >{$gender} </td>";
              echo " <td >{$email} </td>";
              echo " <td >{$number} </td>";

                  }  
                ?>
          </tr>  
        </tbody>
    </table>
  </div>

   <!-- a BACK Button to go to pervious page -->
  <div class="container text-center mt-5">
    <a href="students.php" class="btn btn-warning mt-5"> Back </a>
  <div>
