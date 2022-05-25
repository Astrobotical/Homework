<div class="container-fluid bg-3 text-center">
    <div class="row">
<div class ="Box">
    <?php include('totalcontrol.php');
      
    $Objects = new Plusultra;
    $ConnectionString = $Objects->Connectionstring();
    $sql = "SELECT * FROM Projects";
    $res = mysqli_query($ConnectionString, $sql);    
     while($row1 = mysqli_fetch_array($res)):;?>
<div class="card col-md-3" style="width: 18rem;">
  <img class="card-img-top img-responsive" src="<?php echo $row1[2];?>"style="width:300px;height:300px;" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row1[1];?></h5>
    <p class="card-text"><?php echo $row1[3];?></p>
    <a href="<?php echo $row1[4];?>" class="btn btn-primary">Go to file</a>
  </div>
</div>
 <?php endwhile;?>
</div>
</div>
</div>