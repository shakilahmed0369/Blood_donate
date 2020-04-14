<?php
  if(isset($_REQUEST['submited']) == true){
    ?>
<div class="alert fixed-top">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Form submited <b>successfully!</b>
</div>
<?php
  }
?>
<!-- header bind with php -->
<?php include('head/header.php')?>
<!-- title section -->
<section class="header-decoration section-gap-top">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="title-aria text-center text-wrap">
          <h1 class="mb-3">Donet Blood For Helping People</h1>
          <p>“Bring a life back to power. Make blood donation your responsibility”</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- blood groupe input section -->
<section class="blood-input">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-10 col-sm-12">
        <div class="input-box">
          <form method="POST" action="result.php">
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect01" name="blood_grp">
                <option selected value="">Choose Blood Groupe</option>
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
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect01" name="department_grp">
                <option value="" selected>Choose Department</option>
                <option value="computer">Computer</option>
                <option value="electrical">Electrical</option>
                <option value="electrical">Cvil</option>
              </select>
            </div>
            <div class="input-group">
              <input class="btn btn-danger btn-block" type="submit" value="submit" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- footer bind with php -->
<?php include('head/footer.php')?>