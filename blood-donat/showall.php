<?php
if(!isset($_REQUEST['ok'])){
  header('location: login.php');
}
include('head/header.php')
?>
<?php
include('connection/connect.php');
$sql = "SELECT * FROM blood_data";
$results = mysqli_query($conn, $sql);
?>
<section class="profile-cover section-gap-top">
  <div class="container">
    <div class="text text-center">

      <h1 class="text-white display-3"
        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ALL Data's</h1>
    </div>
  </div>
</section>
<section class="all-data">
  <div class="container-fluid">
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Photo</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">Age</th>
          <th scope="col">Roll</th>
          <th scope="col">Blood</th>
          <th scope="col">Department</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
      $i = 0;
      foreach($results as $result){
          $i++;
     ?>
        <tr>
          <th scope="row"><?php echo $i?></th>
          <td><img style="width: 50px; height: 50px;" src="avater/<?php echo $result['avater']?>" alt=""></td>
          <td><?php echo $result['full_name']?></td>
          <td><?php echo $result['phone']?></td>
          <td><?php echo $result['address']?></td>
          <td><?php echo $result['age']?></td>
          <td><?php echo $result['roll']?></td>
          <td><?php echo $result['blood_grp']?></td>
          <td><?php echo $result['department']?></td>
          <td><a class="btn btn-primary" href="edit.php?id=<?php echo $result['ID']?>">Edit</a></td>
          <td><a onclick="return confirm('Are you sure you wanna delete this data?')" class="btn btn-danger"
              href="delete.php?id=<?php echo $result['ID']?>"">Delete</a></td>
    </tr>
    <?php
      } 
      ?>
  </tbody>
</table>
      </div>
  </section>
<?php include('head/footer.php')?>