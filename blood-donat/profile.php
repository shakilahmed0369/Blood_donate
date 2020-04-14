<?php
  include('connection/connect.php');
  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM blood_data WHERE id=$id";
  $results = mysqli_query($conn, $sql);

?>
<?php include('head/header.php')?>
<!-- itle section -->
<section class="profile-cover section-gap-top">
  <div class="container">
  </div>
</section>
<!-- profile image and ditails  -->
<?php 
  foreach($results as $result){
    ?>
<section class="profile-header">
  <div class="container">
    <div class="justify-content-center text-center">
      <div class="profile-img">
        <img class="img-fluid" src="avater/<?php echo $result['avater'];?>" alt="">
      </div>
      <div class="profile-title">
        <h1 class="text-capitalize mb-0"><?php echo $result['full_name'];?></h1>
      </div>
    </div>
  </div>
</section>
<section class="data-table-section">
  <div class="container">
    <div class="table-data col-10 m-auto mt-4">
      <table class="table table-bordered text-left">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Department</td>
            <td><?php echo $result['department']?></td>
          </tr>

          <tr>
            <th scope="row">2</th>
            <td>Name</td>
            <td><?php echo $result['full_name']?></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Roll</td>
            <td><?php echo $result['roll']?></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Phone</td>
            <td><?php echo $result['phone']?></td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Blood Groupe</td>
            <td><?php echo $result['blood_grp']?></td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Address</td>
            <td><?php echo $result['address']?></td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Birth Date</td>
            <td><?php echo $result['birth_date']?></td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>Age</td>
            <td><?php echo $result['age']?></td>
          </tr>
          <?php
           }
           ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php include('head/footer.php')?>