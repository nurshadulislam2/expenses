<?php
session_start();
$res="";

include "../classes/Database.php";
include "../classes/Expense.php";

$db =   new Database();

if(!$_SESSION['id']){
    header("location: ../login.php");
}

if(isset($_POST['create'])){
    $name   =   $_POST['name'];
    $userId =   $_SESSION['id'];

    $exp    =   new Expense($db);
    $res=$exp->create($userId, $name);
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

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
        if($res==1){
            ?>
            <div class="alert alert-primary" role="alert">
                <p class="text-center">Expense Created</p>
            </div>
            <?php
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 my-5">
            <div class="card">
                <h5 class="card-header">Create Expense</h5>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3 row">
                            <label for="name" class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                        </div>
                        <button type="submit" name="create" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
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