<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include('confiq/dbcon.php');
include('includes/header.php');

?>

<?php 
if(isset($_POST['data_delete']))
{
    $property_id = $_POST['data_delete'];

    $query = "DELETE FROM property_table WHERE id='$property_id'";
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
    <h1 class="mt-4">Besut Admin Panel Dashboard</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Dashboard</li>
      </ol>
     
     

        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Besut Data (Every State in Malaysia)</h4>
                </div>
            </div>
            <div class="card-body">
               <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>State</th>
                        <th>Property Type</th>
                        <th>Address</th>
                        <th>Owner</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $query = "SELECT * FROM property_table";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['state']; ?></td>
                            <td><?= $row['property_type']; ?></td>
                            <td><?= $row['address']; ?></td>
                            <td><?= $row['owner']; ?></td>
                            <td><a href="data-edit.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a></td>
                            <td> 
                                
                                <form action="index.php" method="POST">
                                <button type="submit" name="data_delete" value="<?=$row['id'];?>" class="btn btn-danger">Delete</button>
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

<?php 
include('includes/footer.php');
include('includes/scripts.php');

?>