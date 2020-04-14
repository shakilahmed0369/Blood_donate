<?php
//hehe PHP start here
//db connection 
include('connection/connect.php');
//variables for erros ---------------
$error = $fname_err = $phone_err = $address_err = $birth_err = $age_err = $roll_err = $blood_err = $department_err = $avater_err = "";
//variables for input's---------------
$fname = $phone = $address = $birth = $age = $roll = $blood = $department = $avaterName = "";
//function for Protect XSS hacking attack==================
function data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_REQUEST['submit'])){
  // name validate--------------------
  if(empty($_REQUEST['fname'])){
    $fname_err = "Fill your name";
  }else{
    $fname = data($_REQUEST['fname']);
  }
  //phone validate
  if(empty($_REQUEST['phone'])){
    $phone_err = "Fill your phone Number";
  }elseif(strlen(data($_REQUEST['phone'])) === 11){
    $phone = data($_REQUEST['phone']);// main input goes here
  }else{
    $phone_err = "Phone number is worng";
  }
  //address validate
  if(empty(data($_REQUEST['address']))){
    $address_err = "Fill the Address";
  }else{
    $address = data($_REQUEST['address']);//main input gose here
  }
  //birth date validate
  if(empty(data($_REQUEST['birthDate']))){
    $birth_err = "Fill birth date";
  }else{
    $birth = data($_REQUEST['birthDate']);
  }
  // age validating
  if(empty(data($_REQUEST['age']))){
    $age_err = "Fill age";
  }else{
    $age = data($_REQUEST['age']);
  }
  // roll validating
  if(empty(data($_REQUEST['roll']))){
    $roll_err = "Fill roll";
  }else{
    $roll = data($_REQUEST['roll']);
  }
  // blood group validator
  if(empty(data($_REQUEST['blood']))){
    $blood_err = "Select blood group";
  }else{
    $blood = data($_REQUEST['blood']);
  }
  // Department validator
  if(empty(data($_REQUEST['department']))){
    $department_err = "Select department";
  }else{
    $department = data($_REQUEST['department']);
  }
  //avater validate
  if(empty(data($_FILES["avater"]["name"]))){
      $avater_err = "profile picture is require";
  }elseif(isset($_FILES["avater"])){
      $fileName = $_FILES["avater"]["name"];
      $fileSize = $_FILES["avater"]["size"];
      $div = explode('.',$fileName);
      $fileExt = strtolower(end($div));
      $ext = array("gif", "jpeg", "jpg", "png");
    if(in_array($fileExt,$ext) === false){
      $avater_err = "Image extension not allowed!";
    }elseif($fileSize > 1000000){
      $avater_err = "Image size must be less then 1MB";
    }else{
      $avaterName = data($_FILES["avater"]["name"]);
    }

  }



// OKEY!! so all done now we are passing our data to my-database hooo!
  if($fname and $phone and $address and $birth and $age and $roll and $blood and $department and $avaterName == true){
    $avaterTmp = $_FILES["avater"]["tmp_name"];
    $location = "avater/";
    $uniqName = uniqid().".jpg";
    move_uploaded_file($avaterTmp,$location.$uniqName);
    $sql = "INSERT INTO blood_data(full_name,phone,address,birth_date,age,roll,blood_grp,department,avater) VALUE ('$fname','$phone','$address','$birth','$age', '$roll', '$blood','$department', '$uniqName')";
    mysqli_query($conn, $sql);
    header('location: index.php?submited=1');

  }

}

?>

<?php include('head/header.php')?>

<!-- title section -->
<section class="header-decoration section-gap-top">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="title-aria text-center text-wrap">
          <h1 class="mb-3 text-uppercase">registration form</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- blood groupe input section -->
<section class="blood-input">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10 col-sm-12">
        <div class="input-box">
          <form enctype="multipart/form-data" action="" method="POST" id="myForm">
            <div class="form-row">
              <!-- full name -->
              <div class="form-group col-md-6">
                <label for="inputName">Full Name</label>
                <input value="<?php echo $fname?>" name="fname" type="text" class="form-control" id="inputName"
                  placeholder="Full Name">
                <span style="font-size: 15px; color: red;"><?php echo $fname_err?></span>
              </div>
              <!-- phone number -->
              <div class="form-group col-md-6">
                <label for="inputTel">Phone</label>
                <input value="<?php echo $phone?>" name="phone" class="form-control" type="number"
                  placeholder="01969290200" id="inputTel">
                <span style="font-size: 15px; color: red;"><?php echo $phone_err?></span>
              </div>
            </div>
            <!-- Address -->
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input value="<?php echo $address?>" name="address" type="text" class="form-control" id="inputAddress"
                placeholder="1234 Main St">
              <span style="font-size: 15px; color: red;"><?php echo $address_err?></span>
            </div>
            <!-- Birth Date -->
            <div class="form-row">
              <div class="form-group col-12 col-md-8">
                <label for="inputAddress">Birth Date</label>
                <input value="<?php echo $birth?>" name="birthDate" class="form-control" type="date"
                  id="example-date-input">
                <span style="font-size: 15px; color: red;"><?php echo $birth_err?></span>
              </div>
              <!-- Age -->
              <div class="form-group col-12 col-md-2">
                <label for="inputAddress">Your Age</label>
                <input value="<?php echo $age?>" name="age" class="form-control" type="number"
                  id="example-number-input">
                <span style="font-size: 15px; color: red;"><?php echo $age_err?></span>
              </div>
              <!-- Class roll -->
              <div class="form-group col-12 col-md-2">
                <label for="age-number-input">Your Roll</label>
                <input value="<?php echo $roll?>" name="roll" class="form-control" type="number" id="age-number-input">
                <span style="font-size: 15px; color: red;"><?php echo $roll_err?></span>
              </div>
            </div>
            <!-- Blood Groupe -->
            <div class="form-row">
              <div class="form-group col-12 col-md-6">
                <label for="inputAddress">Blood Groupe</label>
                <div class="input-group">
                  <select value="<?php echo $blood?>" name="blood" class="custom-select" id="inputGroupSelect">
                    <option value="">Choose Blood Groupe</option>
                    <option value="A negative(-)">A negative(-)</option>
                    <option value="A positive(+)">A positive(+)</option>
                    <option value="AB negative(-)">AB negative(-)</option>
                    <option value="AB positive(+)">AB positive(+)</option>
                    <option value="B negative(-)">B negative(-)</option>
                    <option value="B positive(+)">B positive(+)</option>
                    <option value="O negative(-)">O negative(-)</option>
                    <option value="O positive(+)">O positive(+)</option>
                  </select>
                </div>
                <span style="font-size: 15px; color: red;"><?php echo $blood_err?></span>
              </div>
              <!-- Department -->
              <div class="form-group col-12 col-md-6">
                <label for="inputAddress">Department</label>
                <div class="input-group">
                  <select value="<?php echo $department?>" name="department" class="custom-select"
                    id="inputGroupSelect">
                    <option value="" selected>Choose Department</option>
                    <option value="Computer">Computer</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Cvil">Cvil</option>
                  </select>
                </div>
                <span style="font-size: 15px; color: red;"><?php echo $department_err?></span>
              </div>
            </div>
            <!-- Profile picture -->
            <div class="input-grp">
              <label for="customFile">Profile Picture</label>
              <div class="custom-file mb-3">
                <input name="avater" type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <span style="font-size: 15px; color: red;"><?php echo $avater_err?></span>
              </div>
            </div>
            <!-- submit button -->
            <div class="input-group mt-4">
              <input name="submit" type="submit" value="Register" class="btn btn-danger btn-block">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('head/footer.php')?>