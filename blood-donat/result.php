<?php 
// php start here
//connection for php
include('connection/connect.php');
//variable for error
$error = $data_error = "";
if(empty($_REQUEST['blood_grp']) or empty($_REQUEST['department_grp'])){
  header('location: index.php');
}elseif(isset($_REQUEST['blood_grp']) and isset($_REQUEST['department_grp'])){
  $searchKye = $_REQUEST['blood_grp'];
  $dep_search = $_REQUEST['department_grp'];
  $sql = "SELECT * FROM blood_data WHERE blood_grp='$searchKye' and department='$dep_search'";
  $results = mysqli_query($conn, $sql);
}
//counter for data
if(mysqli_num_rows($results) == 0){
  $data_error = "NO Data Found :(";
}
?>

<?php include('head/header.php')?>
<!-- title section -->
<section class="profile-cover section-gap-top">
  <div class="container">
    <div class="text text-center">
      <h1 class="text-white display-3"
        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">RESULT</h1>
    </div>
  </div>
</section>
<!-- profile image and ditails  -->
<div class="result-section mt-5">
  <div class="container">
    <table class="table table-bordered text-wrap table-sm text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Picture</th>
          <th scope="col">Name</th>
          <th scope="col">Blood Group</th>
          <th scope="col">Department</th>
          <th scope="col">Roll</th>
          <th scope="col">Viwe</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $i = 0;
      foreach($results as $result){  
        $i++;
      ?>
        <tr>
          <th scope="row"><?php echo $i;?></th>
          <td class="text-center"><img style="width: 50px; height: 50px" src="avater/<?php echo $result["avater"]?>"
              alt=""></td>
          <td><?php echo $result["full_name"];?></td>
          <td><?php echo $result["blood_grp"];?></td>
          <td><?php echo $result["department"];?></td>
          <td><?php echo $result["roll"];?></td>
          <td class="text-center"><a class="btn btn-primary" href="profile.php?id=<?php echo $result["ID"]?>">Viwe
              Profile</a></td>
        </tr>
        <?php
      }
      ?>
      </tbody>
    </table>
    <p class="display-4 text-center text-danger"><?php echo $data_error?></p>
  </div>
</div>
<?php include('head/footer.php')?>