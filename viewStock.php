<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Vendas</title>
    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <!--CSS Bootstrap-->
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
    
    <!--Javascript bootstrap -->
    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
     crossorigin="anonymous"></script>
    <!-- css do projeto -->
  
     <!--bootstrap icons-->
     <link
     rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        />
   <!--Seu css-->
   <link rel="stylesheet" href="_css/viewStock.css">
   <script src="_scripts/personal_scripts.js" type="text/javascript"></script>
   <script src="_scripts/jquery-3.6.1.js"></script>
   <script src="_scripts/jquery_scripts.js"></script>

</head>
<body>
    <script>
        fadeEverythingIn();
</script>
        <!--barra de navegação-->

        <header class="navbar fixed-top bg-primary-color" id="navbar">
            <div class="container justify-content-center " id="container-marca">
                <a href="home.html" class="link link-danger"><i class="bi bi-gear-wide-connected px-2"></i></a>
                <h2 class="title  py-3 text-center">Analisystem</h2>
            </div>
            <div class="container justify-content-center" id="navbar-items">
                <ul class="navbar-nav  flex-row px-3 mb-3">
                    <li class="nav-item px-3">
                        <a href="home.html" class="nav-link " >Home</a>
                    </li>
                    <li class="nav-item dropdown px-3">
                        <a  class="nav-link active dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            data-bs-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false"
                            aria-current="page">
                          Stock
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="stock.html">New register</a>
                          <a class="dropdown-item" href="viewStock.php">View stock</a>
                        </div>
                      </li>
                    <li class="nav-item px-3">
                        <a href="user.html" class="nav-link">User</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="nav-link ">Management</a>
                    </li>
                </ul>
            </div>
        </header>

        <!-- Container das informações -->
    <section>
        <div class="container bg-dark-color py-3" style="
            border: 1px red solid; border-radius:10px">
                <div class="row">
                    <!--Table-->
                    <div class="col text-center">
                        <h1 class="products text-center">Products</h1>
                    <table class="table table-dark table-striped text-center table-hover align-self-md-center" id="tabela-produtos">
                        <thead id="header-fixed">
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Provider</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('_phpscripts/sql_functions.php');
                            retrieveAll();
                            ?>
                        </tbody>
                    </table>
                    <button class="btn btn-danger" id="deletebutton">Delete</button>
                </div>
        </section>
    </body>
    <script>
        $(document).ready(function(){
            $('table tbody tr').click(function(){
                $(this).css('--bs-table-bg', '#a03838');
                $(this).css('--bs-table-striped-bg', '#eb6c6c');
                var code = $(this).text().substring(0,3);
                $("#deletebutton").click(function(){
                    $.ajax({
                        type:'GET',
                        url: "_phpscripts/dataDelete.php",
                        data: {Key: code},
                        success: function(data){
                            location.reload();
                        }

                    })
                })
            });
        });
    </script>
</html>