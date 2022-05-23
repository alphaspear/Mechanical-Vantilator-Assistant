<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];
        $agecheck=mysqli_query($con,"SELECT age FROM user WHERE email='$email'");
        while($row=mysqli_fetch_array($agecheck) )
                        {
                            $age=$row['age'];                            
                        }
        
    }
    if(@$_GET['q']== 'addData') 
    {
      $hr = $_POST['hr'];
      $rr = $_POST['rr'];
      $spo2=$_POST['spo2'];
      $fio2=$_POST['fio2'];
      $peep=$_POST['peep'];
      $pao2=$_POST['pao2'];
      
      $q3=mysqli_query($con,"INSERT INTO user_data VALUES  ('$id','$hr','$rr','$spo2','$fio2','$peep','$pao2', NOW())");
      header("location:dashboard.php?q=0");
    }
?>
<?php
        $count=0;
        $q=mysqli_query($con,"SELECT * FROM user_data WHERE id='$id' ORDER BY 'date' " );
        while($row=mysqli_fetch_array($q) )
                        {
                            $count++;                            
                        }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ONGC Quiz System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <script>
        function getStatus(){
        var count = <?php echo $count; ?>;
        if(count<3)
        {
            document.getElementById("output").innerHTML = "Insufficient data for prediction";
            return;
        }
        else
        {
            var request = new XMLHttpRequest();
            request.open('GET', 'http://127.0.0.1:5000/93&23&4&78');
            request.send();
            request.onload = ()=>{
                document.getElementById("output").innerHTML = request.response;
        }
        }
        
        //document.getElementById("output").innerHTML = count;
    }
    </script>
       
</head>

<body style=" background-color:orange" onload="getStatus();">
<nav class="navbar navbar-expand-lg navbar-expand-lg-md navbar-light bg-light">
  <a class="navbar-brand" href="#"><b>Mechanical Ventilator Assistant</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dashboard.php?q=0" style="color:#827b7b;font-size: 15px; ">HOME<span class="sr-only">(current)</span></a></li>
                    <li style="padding-left :20px;" class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
                    <li style="padding-left :20px;" ><a href="dashboard.php?q=1" style="color:#827b7b;font-size: 15px;">ADD DETAILS</a></li>
                    <li  <?php echo'  '; ?> > <a href="logout.php?q=dashboard.php" style="color:#827b7b;font-size: 15px;padding-left :20px;"><span class="glyphicon glyphicon-log-out" aria-hidden="true" style="color:#827b7b;"></span>&nbsp;LOGOUT</a></li>
    </ul>
  </div>
</nav>



    <div class="container">
        <div class="row">
        <h1 style="color:white; font-size:40px;text-shadow:5px 5px 5px black;"><i><b>Welcome '.$name.'</b></i></h1>
        <canvas id="heartRate" style="width:100%;max-width:700px"></canvas> <canvas id="respitoryRate" style="width:100%;max-width:700px"></canvas>
                <div class="col-12 col-sm-6 col-md-4">
				<div class="card mx-2 my-2" href="google.com">
						<div class="card-body">
							<h4><b>Recomendation</b></h4>
                            <h5 id="output"></h5>
                        </div>
					</div>
					</div></table></div></div>
                <!--result functionalitty&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&-->
                <?php
                    if(@$_GET['q']==1) 
                        echo '<div class="row"><center><span class="title1" style="font-size:30px;color:#fff;"><b>Enter Patient Details</b></span></center><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6">   
                        <form class="form-horizontal title1" name="form" style="color:#fff;" action="dashboard.php?q=addData" method="POST">
                            <fieldset>

                                <div class="form-group">
                                    <label class="col-md-13 control-label" for="hr">Heart Rate Beats/Minutes</label>
                                    <div class="col-md-13">
                                        <input id="hr" name="hr" placeholder="" class="form-control input-md" min="0" max="200" type="number" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-13 control-label" for="rr">Respiratory Rate Breaths/Minute.</label>  
                                    <div class="col-md-13">
                                        <input id="rr" name="rr" placeholder="" class="form-control input-md" min="0" max="40" type="number" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-13 control-label" for="spo2">Oxygen Saturation SpO2</label>  
                                    <div class="col-md-13">
                                        <input id="spo2" name="spo2" placeholder="" class="form-control input-md" min="0" max="100" type="number" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-13 control-label" for="fio2">Fraction of Inspired Oxygen FiO2</label>  
                                    <div class="col-md-13">
                                        <input id="fio2" name="fio2" placeholder="" class="form-control input-md" min="1" max="100" type="number" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-13 control-label" for="peep">Positive End-Expiratory Pressure PEEP</label>  
                                    <div class="col-md-13">
                                        <input id="peep" name="peep" placeholder="" class="form-control input-md" min="1" max="30" type="number" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-13 control-label" for="pao2">Partial Pressure of Oxygen PaO2</label>  
                                    <div class="col-md-13">
                                        <input id="pao2" name="pao2" placeholder="" class="form-control input-md" min="1" max="200" type="decimal" required>
                                    </div>
                                </div>                                

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12"> 
                                        <input  type="submit" style="margin-left:45%; color:black; background:#cccccc" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>                
    
    <script>
    var ctx = document.getElementById("heartRate").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: <?php
        $q=mysqli_query($con,"SELECT * FROM user_data WHERE id='$id' ORDER BY 'date' " );
        echo'[';
        while($row=mysqli_fetch_array($q) )
                        {
                            $hh=$row['hr'];
                            $rr=$row['rr'];
                            $time=$row['date'];
                            echo'"'.$time.'",';                            
                        }
                        echo']';
    ?>,
        datasets: [
          {
            label: "Heart Rate",
            data: <?php
        $q=mysqli_query($con,"SELECT * FROM user_data WHERE id='$id' ORDER BY 'date' " );
        echo'[';
        while($row=mysqli_fetch_array($q) )
                        {
                            $hh=$row['hr'];
                            $rr=$row['rr'];
                            $time=$row['date'];
                            echo'"'.$hh.'",';                            
                        }
                        echo']';
    ?>,
            backgroundColor: "rgba(153,205,1,0.6)",
          }
        ],
      },
    });
  </script>


<script>
    var ctx = document.getElementById("respitoryRate").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: <?php
        $q=mysqli_query($con,"SELECT * FROM user_data WHERE id='$id' ORDER BY 'date' " );
        echo'[';
        while($row=mysqli_fetch_array($q) )
                        {
                            $hh=$row['hr'];
                            $rr=$row['rr'];
                            $time=$row['date'];
                            echo'"'.$time.'",';                            
                        }
                        echo']';
    ?>,
        datasets: [
          {
            label: "Respiratory Rate",
            data: <?php
        $q=mysqli_query($con,"SELECT * FROM user_data WHERE id='$id' ORDER BY 'date' " );
        echo'[';
        while($row=mysqli_fetch_array($q) )
                        {
                            $hh=$row['hr'];
                            $rr=$row['rr'];
                            $time=$row['date'];
                            echo'"'.$rr.'",';                            
                        }
                        echo']';
    ?>,
            backgroundColor: "rgba(153,205,1,0.6)",
          }
        ],
      },
    });
  </script>
</body>
</html>















//////////////////////////////////



<?php
                                
                                if($count==0)
                                {
                                    echo'<h1>Insufficient data for prediction</h1>';
                                }
                                if($count>=3)
                                {
                                $hrcheck3=mysqli_query($con,"SELECT hr FROM user_data ORDER BY date DESC LIMIT 3");
        
                                $hr3 = array(0,0,0);
                                $i=0;
                                while($row=mysqli_fetch_array($hrcheck3) )
                                {
                                    $hr3[$i]=$row['hr'];
                                    $i++;                            
                                }
                                $rrcheck3=mysqli_query($con,"SELECT rr FROM user_data ORDER BY date DESC LIMIT 3");
                                $rr3 = array("0","0","0");
                                $i=0;
                                $history = array("0","0","0");
                                while($row=mysqli_fetch_array($rrcheck3) )
                                {
                                    $rr3[$i]=$row['rr'];
                                    $i++;                            
                                }    
                                    //echo '<h1>'.$ones_counter.'</h1>';
                                }
                            ?>