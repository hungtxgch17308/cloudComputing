<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Add</title>
</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><i class="fas fa-user-plus"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="body">
            <?php 
                require("connect.php");   
                if(isset($_POST["submit"]))
                    {
                        $name = $_POST["proname"];
                        $price = $_POST["price"];
                        $descrip = $_POST["descrip"];
                        if ($name == ""||$price == ""|| $descrip == "") 
                            {
                                ?>
                                <script>
                                    alert("Product information should not be blank!!");
                                </script>
                                <?php
                            }
                        else
                            {
                                $sql = "select * from product where proname='$name'";
                                $query = pg_query($conn, $sql);
                                if(pg_num_rows($query)>0)
                                {
                                ?> 
                                    <script>
                                        alert("The product is available!!");
                                    </script>
                                <?php
                                }
                                else
                                {
                                    $sql = "INSERT INTO product(proname, price, descrip) VALUES ('$name','$price','$descrip')";
                                    pg_query($conn,$sql);
                                    ?> 
                                        <script>
                                            alert("Added successful!");
                                            window.location.href = "/managing.php";
                                        </script>
                                    <?php
                                }
                            }
                    }
                    ?>

        <form action="/add.php" method="POST">
            <div class="container">            
                <div class="register-new-student">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h2>Create New Products</h2>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-user"></i></div>
                                <input type="text" name="proname" class="form-control" id="name" placeholder="Name" required autofocus>
                            </div>
                        </div>
                    </div>                       
                </div>     
                
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="name">Price</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-money-check-alt"></i></div>
                                <input type="text" name="price" class="form-control" id="name" placeholder="Price" required autofocus>
                            </div>
                        </div>
                    </div>                       
                </div>      

                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="name">Description</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-user-edit"></i></div>
                                <input type="text" name="descrip" class="form-control" id="name" placeholder="Description" required autofocus>
                            </div>
                        </div>
                    </div>                       
                </div>     
                    
                <div class="row">
                    <div class="col-md-3">
                        <button  class="btn btn-success"><a href="/managing.php" style="text-decoration: none; color: white;">Back</a></button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Create</button>
                    </div>
                </div>
            </div>
        </form>      
    </div>
</body>

</html>