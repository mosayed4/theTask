<?php
session_start();
if ( !isset($_SESSION['user'] )) {
    header('Location:login.php' );
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/mdb-ui-kit/css/mdb.min.css" rel="stylesheet">
    
</head>
<body>


    <section class="vh-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Rukn</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a href="logout.php" class="btn btn-warning">Logout</a>

    </div>
  </div>
</nav>
        <div class="container py-6 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 mt-100">
                <div class="col">
                    <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                        <div class="card-body py-4 px-4 px-md-6">
                            <form action="insert.php" method="POST">
                                <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                    <i class="fas fa-check-square me-1"></i>
                                    <u>My Todo for Rukn</u>
                                </p>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-center">
                                            <input type="text" class="form-control form-control-lg" name="list" id="exampleFormControlInput1" placeholder="Add new...">
                                            <a href="#!" data-mdb-tooltip-init title="Set due date"><i class="fas fa-calendar-alt fa-lg me-3"></i></a>
                                            <div>
                                                <button type="submit" value="Submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-4">
                            <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
                                <p class="small mb-0 me-2 text-muted">Filter</p>
                                <select data-mdb-select-init>
                                    <option value="1">All</option>
                                    <option value="2">Completed</option>
                                    <option value="3">Active</option>
                                    <option value="4">Has due date</option>
                                </select>
                                <p class="small mb-0 ms-4 me-2 text-muted">Sort</p>
                                <select data-mdb-select-init>
                                    <option value="1">Added date</option>
                                    <option value="2">Due date</option>
                                </select>
                                <a href="#!" style="color: #23af89;" data-mdb-tooltip-init title="Ascending"><i class="fas fa-sort-amount-down-alt ms-2"></i></a>
                            </div>
                            <!-- PHP code to fetch data from the database -->
                            <?php
                            include 'confing.php';            
                            $result = mysqli_query($con, "SELECT * FROM tbtodo") or die('Query Failed');
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th >Task</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    </div>
                                                    <?php echo $row['id']; ?>  
                                                </td>
                                                <td>
                                                    <input class="form-check-input me-0" type="checkbox" aria-label="..." <?php echo isset($row['completed']) && $row['completed'] ? 'checked' : ''; ?> />
                                                    <?php echo $row['list']; ?>
                                         
                                                 </td> 
                                                
                                                <td style="width: 10%; " ><a href="edit.php? ID=<?php echo $row['id']; ?>" class="btn btn-success"> Update</a> 
                                                <a href="delete.php?  ID=<?php echo $row['id']; ?>"class="btn btn-danger">Delete</a> 
                                            </td>
                                                </td>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
