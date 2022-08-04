<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include('confiq/dbcon.php');
include('includes/header.php');

?>

<?php 
   if(isset($_POST['save_select']))
   {
      $state = $_POST['state'];
      $property_type = $_POST['property_type'];
      $address = $_POST['address'];
      $owner = $_POST['owner'];
      
      $query = "INSERT INTO property_table (state,property_type,address,owner) VALUES ('$state','$property_type', '$address', '$owner')";
      $query_run = mysqli_query($conn, $query);

      if($query_run)
      {
        echo "<script>alert('Inserted Completed.')</script>";
      
      }
      else
      {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
      
      }

   }


?>




<div class="container-fluid px-4">
    <h1 class="mt-4">Input Data For Besut Database</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active"> </li>
      </ol>
   
      <div class="row justify-content-center">
       
      <div class="col-md-5">
              <div class="card">
                <div class="card-header">
                    <h4>Input New Data</h4>
                </div>
                <div class="card-body">

                    <form action="add-data.php" method="POST" id="input_form">

                  <div class="form-group mb-3">
                    <label>Select State</label>
                    <select required id="state" name="state" class="form-control">
                    <option value="">--Select State--</option>
                    <option value="Perlis">Perlis</option>
                    <option value="Kedah">Kedah</option>
                    <option value="Terengganu">Terengganu</option>
                    <option value="Kelantan">Kelantan</option>
                    <option value="Pulau Pinang">Pulau Pinang</option>
                    <option value="Selangor">Selangor</option>
                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Perak">Perak</option>
                    <option value="Pahang">Pahang</option>
                    <option value="Negeri_Sembilan">Negeri sembilan</option>
                    <option value="Melaka">Melaka</option>
                    <option value="Johor">Johor</option>
                    <option value="Sabah">Sabah</option>
                    <option value="Sarawak">Sarawak</option>
                    <option value="Labuan">Labuan</option>
                    <option value="Putrajaya">Putrajaya</option>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label>Property type</label>
                    <select required name="property_type" id="property_type" class="form-control">
                    <option value="">--Select Property--</option>
                    <option value="Condominium">Condominium</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Flat">Flat</option>
                    <option value="Bungalow">Bungalow</option>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label>Address</label>
                    <input required id="address" name="address" type="text" placeholder="Enter Full Address" class="form-control">
                  </div>
                  <div class="form-group mb-3">
                    <label>Owner's Full Name</label>
                    <input name="owner" type="text" placeholder="Enter Owner's Full Name" class="form-control">
                  </div>

                  <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary" name="save_select" id="save_select">Submit</button>
                    <button type="reset" class="btn btn-primary" name="reset">Reset</button>
                  </div>
                  </form>

             

                </div>
              </div>
            </div>

      </div>
    </div>

   

<?php 
include('includes/footer.php');
include('includes/scripts.php');

?>
