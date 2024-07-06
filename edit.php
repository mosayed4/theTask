<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/mdb-ui-kit/css/mdb.min.css" rel="stylesheet">

    <title>Updata</title>
</head>
<body>
    <?php 
    include 'confing.php' ;
     $id = $_GET['ID'];
    $redata = mysqli_query($con,"SELECT * FROM tbtodo WHERE id = $id");
    $data = mysqli_fetch_array($redata);

    ?>
<form action="update.php" method="POST">
                                <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                    <i class="fas fa-check-square me-1"></i>
                                    <u>Update for Rukn</u>
                                </p>
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="d-flex  flex-row align-items-center">
                                            <input type="text" class="form-control form-control-lg"   name="list"  value="<?php echo $data['list'] ?>"    placeholder="Add new...">
                                            <a href="#!" data-mdb-tooltip-init title="Set due date"><i class="fas fa-calendar-alt fa-lg me-7"></i></a>
                                            <div>
                                                <button type="submit" value="Submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Add</button>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </form>


</body>
</html>