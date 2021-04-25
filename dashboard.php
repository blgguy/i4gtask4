<?php require_once('header.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Dashboard Page | I4G_Training Task 04</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="d-grid gap-2 d-md-block">
                    <a href="course.php"><button class="btn btn-success" type="button">Add Course</button></a>
                    <a href="signout.php"><button class="btn btn-danger" type="button">Logout</button></a>
                    <a href="password.php"><button class="btn btn-danger" type="button">Password Reset</button></a>
                </div>
            </div>
            <div class="col-sm-8">
                <table class="table table-sm">
                    <thead>	
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">video</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Tutor</th>
                        <th scope="col">price</th>
                        <th scope="col">date</th>
                        <th scope="col">...</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $id = 1;
                        foreach ($courses as $key) {
                            $idd   = $key['id'];
                            $title = $key['title'];
                            $desc = $key['description'];
                            $tutor = $key['tutor'];
                            $price = $key['price'];
                            $video = $key['video'];
                            $dateReg = $key['dateReg'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo $id++;?></th>
                            <td>
                            <video width="100" height="100" controls>
                                <source src="controller/files/<?php echo $video;?>" type="video/mp4">
                                <source src="controller/files/<?php echo $video;?>" type="video/mov">
                                <source src="controller/files/<?php echo $video;?>" type="video/avi">
                                Your browser does not support the video tag.
                            </video>
                            </td>
                            <td><?php echo $title;?></td>
                            <td><?php echo $desc;?></td>
                            <td><?php echo $tutor;?></td>
                            <td><?php echo $price;?></td>
                            <td><?php echo $dateReg;?></td>
                            <td>  
                                <a href="courseEdit.php?id=<?php echo $idd;?>"><button type="button" class="btn btn-outline-success">Edit</button>
                                <a href="courseDel.php?id=<?php echo $idd;?>"><button type="button" class="btn btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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