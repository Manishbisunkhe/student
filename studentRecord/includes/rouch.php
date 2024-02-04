<?php
$query = "SELECT u.*, s.subject_name 
          FROM user u 
          LEFT JOIN subject s ON u.subject_names = s.id";
$view_users = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($view_users)) {
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $gender = $row['gender'];
    $email = $row['email'];
    $number = $row['number'];
    $subject_name = $row['subject_name'];  // This now contains the subject name

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$firstname}</td>";
    echo "<td>{$lastname}</td>";
    echo "<td>{$gender}</td>";
    echo "<td>{$email}</td>";
    echo "<td>{$number}</td>";
    echo "<td>{$subject_name}</td>"; // Display subject_name from the JOINed table

    echo "<td class='text-center'><a href='studentview.php?user_id={$id}' class='btn btn-primary'><i class='bi bi-eye'></i> View</a></td>";
    echo "<td class='text-center'><a href='studentupdate.php?edit&user_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> EDIT</a></td>";
    echo "<td class='text-center'><a href='studentdelete.php?delete={$id}' class='btn btn-danger'><i class='bi bi-trash'></i> DELETE</a></td>";
    echo "</tr>";
}
?>