<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include('confiq/dbcon.php');
include('includes/header.php');

?>

<?php 
if(isset($_POST['user_delete']))
{
    $username_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$username_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
      echo "<script>alert('Data has Deleted.')</script>";
    
    }
    else
    {
      echo "<script>alert('Woops! Something Wrong Went.')</script>";
    
    }

}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Dashboard</li>
          <li class="breadcrumb-item ">Users</li>
      </ol>

      <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Registered User</h4>
            </div>
            <div class="card-body">
               <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody> 
                <?php 
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['password']; ?></td>
                            <td><a href="register-edit.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a></td>
                            <td> 
                                <form action="view-register.php" method="POST">
                                <button type="submit" name="user_delete" value="<?=$row['id'];?>" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    ?>  
                    <tr>
                        <td colspan="6">No Record Found </td>
                    </tr>
                    
                    
                    <?php
                }
        
?>
                
                   
                </tbody>
               </table>
            </div>
        </div>
      </div>
      </div>
    </div>


<?php 
include('includes/footer.php');
include('includes/scripts.php');

?>
