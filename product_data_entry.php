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
     <!--bootstrap icons-->
     <link
     rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        />
    <?php
        $nameOfProduct = isset($_POST["nameOfProduct"])?$_POST["nameOfProduct"]: "[No Entry]";
        $productCode = isset($_POST["productCode"])?$_POST["productCode"]: "0";
        $quantity = isset($_POST["quantity"])?$_POST["quantity"]: "0";
        $unformattedPrice = isset($_POST["unitPrice"])?str_replace('R$','',$_POST["unitPrice"]): "0";
        $price= (float)str_replace(',','.',$unformattedPrice);
        $providerContact = isset($_POST["providerContact"])?$_POST["providerContact"]:"[No Entry]";
        $providerNumber = isset($_POST["providerNumber"])?$_POST["providerNumber"]:"(00) 00000-0000";
    ?>    
   <!--Seu css-->
   <style><?php include "_css/estoque.css" ?></style>
</head>
<body>

    <!--barra de navegação-->

    <header class="navbar fixed-top bg-primary-color" id="navbar">
        <div class="container justify-content-center " id="container-marca">
        <a href="home.html" class="link link-danger"><i class="bi bi-gear-wide-connected px-2"></i></a>
            <h2 class="title  py-3 text-center">Analisystem</h2>
        </div>
        <div class="container justify-content-center" id="navbar-items">
            <ul class="navbar-nav  flex-row px-3 mb-3">
                <li class="nav-item px-3">
                    <a href="home.html" class="nav-link active" aria-current="page">Home</a>
                </li>
                <li class="nav-item dropdown px-3">
                    <a  class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        data-bs-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false">
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
        <div class="container py-4">
            <div class="row">
                
                <!--Table de produtos-->
                <div class="col">
                    <h1 class="informations text-center" style="color: #ff4545">Inserted Data</h1>
                    <table class="table table-dark table-striped table-hover text-center" id="tabela-produtos">
                        <thead class="table-dark" id="header-fixed">
                            <tr>
                                <th class="col">Code</th>
                                <th class="col">Product name</th>
                                <th class="col">Quantity</th>
                                <th class="col">Price</th>
                                <th class="col">Provider</th>
                                <th class="col">Contact</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr>
                                <th><?php echo $productCode;?></th>
                                <td><?php echo $nameOfProduct;?></td>
                                <td><?php echo $quantity;?></td>
                                <td>R$ <?php echo $price;?></td>
                                <td><?php echo $providerContact;?></td>
                                <td><?php echo $providerNumber;?></td>
                            </tr>
                            <?php
                                include "_phpscripts/sql_functions.php";
                                insertIntoDatabase($productCode,$nameOfProduct,$quantity,$price,$providerContact,$providerNumber);
                            ?>
                        </tbody>
                    </table>
                    <div class="title text-center" ><a class="text-decoration-none" href="stock.html" style="color: #ff4545">New Register</a></div>
                </div>
            </div>
        </div>   
    </section>
</body>
</html>