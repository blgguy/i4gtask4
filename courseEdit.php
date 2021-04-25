<?php
require_once('class/engine.php');
$getID = $_GET['id'];
$engine = new engine();
$message='';
$view = $engine->viewById('courses', $getID);
foreach ($view as $key) { 
    $Vtitle = $key['title'];
    $Vdesc = $key['description'];      
    $Vtutur = $key['tutor']; 
    $Vprice = $key['price'];     
    $Vvideo = $key['video'];    
}
if (isset($_POST['addCourse'])) {
    $title         =   sentize($_POST['title']);
    $price         =   sentize($_POST['price']);
    $video         =   $_FILES["video"]["name"];
    $desc          =   sentize($_POST['desc']);

    if (empty($title) || empty($price) || empty($desc)) {
        $message = "please fill the require fields";
    }else{ 
        // Check whether video size to not morethan 100 mb is valid 
        if ($_FILES['video']['size'] > 40000000) {
            $message = 'file is greater than 40MB';
        }
        
        $targetDir = "controller/files/"; 
        $allowTypes = array('mp4','avi','mov','3gp','mpeg'); 
        // File upload path 
        $videoName = basename($_FILES['video']['name']); 
        // generating a uniq name for the video
        $datee      = date('d-m-Y');
        $videoType   = pathinfo($video, PATHINFO_EXTENSION); 
        $randky     = '9876543210kyvxabcdefghijklmnopqrstuvwxyz35gnvdjABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randky     = 'course-I4G-Training-'.substr(str_shuffle($randky), 0, 18).$datee;
        $final_name = $randky.'.'.$videoType;
        
        if (!empty($video)) {
            // Check whether video type is valid 
            if(!in_array($videoType, $allowTypes)){
                $message = "File Format Not Suppoted"; 
            }else{
                // Upload file to server 
                $data = array(  
                    'title'         =>  $title,
                    'description'   =>  $desc,      
                    'tutor'         =>  $mainName,  
                    'price'         =>  $price,      
                    'video'         =>  $final_name      
                );
                $update = $engine->update('courses', $data, $getID);
                move_uploaded_file($_FILES["video"]["tmp_name"], $targetDir.$final_name);
                if (!$update) {
                    $message = "Sorry! <br>Having issue updating this course come back later.";
                }else{
                    $message = "<h5 style='font-size:18px; color: #fff font-weight: bolder;'>You Successfully updated this course</h5>";
                }
            }
        }else{
             // Upload file to server 
             $data = array(  
                'title'         =>  $title,
                'description'   =>  $desc,      
                'tutor'         =>  $mainName,  
                'price'         =>  $price,      
                'video'         =>  $Vvideo      
            );
            $update = $engine->update('courses', $data, $getID);
            if (!$update) {
                $message = "Sorry! <br>Having issue updating this course come back later.";
            }else{
                $message = "<h5 style='font-size:18px; color: #fff font-weight: bolder;'>You Successfully update this course</h5>";
            }
        }
    }
}
?>
    
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Couses Page | I4G_Training Task 04</title>
  </head>
  <body>

  <div align="center">
    <?php 
      if( (isset($message)) && ($message!='') ):
        echo '<p>'.$message.'</p>';
      endif;
    ?>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="d-grid gap-2 d-md-block">
                <a href="dashboard.php"><button class="btn btn-success" type="button">Dashboard</button></a>
                <a href="signout.php"><button class="btn btn-danger" type="button">Logout</button></a>
            </div>
        </div>
        <div class="col-sm-8">
            <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="<?php echo $Vtitle;?>" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                <label class="form-label">Price</label>
                <input type="text" name="price" value="<?php echo $Vprice;?>" class="form-control" id="inputPassword4">
                </div>
                <div class="col-md-12">
                <label class="form-label">Add Video</label><br>
                <span style="color: red;">If you will use the current video leave the field blank</span>
                <input class="form-control" name="video" type="file" id="formFile">
                </div>
                <div class="col-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="desc" id="" cols="40" rows="3"><?php echo $Vdesc;?></textarea>
                </div>
                <button type="submit" name="addCourse" class="btn btn-color">Add Course</button>
            </form>
        </div>
    </div>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>