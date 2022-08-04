<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include('confiq/dbcon.php');
include('includes/header.php');

?>

<?php 
  if(isset($_POST['update_user']))
  {
    $username_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$username_id' ";

    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
      echo "<script>alert('Update User Completed.')</script>";
    
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
                <h4>Edit User</h4>
            </div>
            <div class="card-body">
            <?php
            if(isset($_GET['id']))
            {
                $user_id = $_GET['id'];
                $users = "SELECT * FROM users WHERE id='$user_id'";
                $users_run = mysqli_query($conn,$users);

                if(mysqli_num_rows($users_run) > 0)
                {
                    foreach($users_run as $user)
                    {
                    ?>
       
            <form action="register-edit.php" method="POST">
            <input type="hidden" name="user_id" value="<?=$user['id'];?>">
            <div class="col-md-12 mb-3">
                    <label>Username</label>
                    <input type="text" placeholder="Username" name="username" value="<?=$user['username'];?>" class="form-control">
                  </div>
                  <div class="col-md-12 mb-3">
                    <label>Email </label>
                    <input type="email" placeholder="Email" name="email" value="<?=$user['email'];?>" class="form-control">
                  </div>
                  <div class="col-md-12 mb-3">
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                    <button type="submit" name="update_user" class="btn btn-primary">Update Now</button>
                  </div>
            </form>                
            <?php
                    }
                }
                else
                {
                    ?> 
                    <h4>No Record Found</h4>
                    <?php
                }
            }
         
            
            ?>

            <a href="index.php">
            <button class="btn btn-primary ">Dashboard</button>
        </a>
            </div>
        </div>
      </div>
      </div>
    </div>


<?php 
include('includes/footer.php');
include('includes/scripts.php');

?>