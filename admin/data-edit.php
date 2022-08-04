<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include('confiq/dbcon.php');
include('includes/header.php');

?>

<?php 
  if(isset($_POST['update_data']))
  {
    $property_id = $_POST['property_id'];
    $state = $_POST['state'];
    $property_type = $_POST['property_type'];
    $address = $_POST['address'];
    $owner = $_POST['owner'];


    $query = "UPDATE property_table SET state='$state', property_type='$property_type', address='$address', owner='$owner'
             WHERE id='$property_id' ";
    
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        echo "<script>alert('Update Data Complete!!!!.')</script>";

       
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
                <h4>Edit Data </h4>
            </div>
            <div class="card-body">
            <?php
            if(isset($_GET['id']))
            {
                $property_id = $_GET['id'];
                $property = "SELECT * FROM property_table WHERE id='$property_id'";
                $property_run = mysqli_query($conn,$property);

                if(mysqli_num_rows($property_run) > 0)
                {
                    foreach($property_run as $property)
                    {
                    ?>
       
            <form action="data-edit.php" method="POST">
                <input type="hidden" name="property_id" value="<?=$property['id'];?>">
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Select State</label>
                    <select required id="state" name="state" class="form-control">
                    <option value="">--Select State--</option>
                    <option value="Perlis" <?=$property['state'] == 'Perlis' ? 'selected':''?>>Perlis</option>
                    <option value="Kedah" <?=$property['state'] == 'Kedah' ? 'selected':''?>>Kedah</option>
                    <option value="Terengganu" <?=$property['state'] == 'Terengganu' ? 'selected':''?>>Terengganu</option>
                    <option value="Kelantan" <?=$property['state'] == 'Kelantan' ? 'selected':''?>>Kelantan</option>
                    <option value="Pulau Pinang" <?=$property['state'] == 'Pulau Pinang' ? 'selected':''?>>Pulau Pinang</option>
                    <option value="Selangor" <?=$property['state'] == 'Selangor' ? 'selected':''?>>Selangor</option>
                    <option value="Kuala Lumpur" <?=$property['state'] == 'Kuala Lumpur' ? 'selected':''?>>Kuala Lumpur</option>
                    <option value="Perak" <?=$property['state'] == 'Perak' ? 'selected':''?>>Perak</option>
                    <option value="Pahang" <?=$property['state'] == 'Pahang' ? 'selected':''?>>Pahang</option>
                    <option value="Negeri_Sembilan" <?=$property['state'] == 'Negeri_Sembilan' ? 'selected':''?>>Negeri sembilan</option>
                    <option value="Melaka" <?=$property['state'] == 'Melaka' ? 'selected':''?>>Melaka</option>
                    <option value="Johor" <?=$property['state'] == 'Johor' ? 'selected':''?>>Johor</option>
                    <option value="Sabah" <?=$property['state'] == 'Sabah' ? 'selected':''?>>Sabah</option>
                    <option value="Sarawak" <?=$property['state'] == 'Sarawak' ? 'selected':''?>>Sarawak</option>
                    <option value="Labuan" <?=$property['state'] == 'Labuan' ? 'selected':''?>>Labuan</option>
                    <option value="Putrajaya" <?=$property['state'] == 'PutraJaya' ? 'selected':''?>>Putrajaya</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Property type</label>
                    <select required name="property_type" id="property_type" class="form-control">
                    <option value="">--Select Property--</option>
                    <option value="Condominium" <?=$property['property_type'] == 'Condominium' ? 'selected':''?>>Condominium</option>
                    <option value="Apartment"  <?=$property['property_type'] == 'Apartment' ? 'selected':''?>>Apartment</option>
                    <option value="Flat"  <?=$property['property_type'] == 'Flat' ? 'selected':''?>>Flat</option>
                    <option value="Bungalow" <?=$property['property_type'] == 'Bungalow' ? 'selected':''?>>Bungalow</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Address</label>
                    <input required id="address" name="address" value="<?=$property['address'];?>" type="text" placeholder="Edit Full Address" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Owner's Full Name</label>
                    <input name="owner" type="text" value="<?=$property['owner'];?>" placeholder="Edit Owner's Full Name" class="form-control">
                  </div>
                  <div class="col-md-12 mb-3">
                    
                    <button type="submit" name="update_data" class="btn btn-primary" >Update Data</button>
                  
                  </div>

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