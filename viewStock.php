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
   <script src="_scripts/jquery.maskMoney.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


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
                    <button class="btn btn-danger mx-1" id="deletebutton">Delete</button>
                    <button class="btn btn-danger mx-1 open" id="editbutton">Edit</button>
                </div>
        </section>
    <div class="popup-overlay">
        <div class="popup-content">
            <h2>Edit Item</h2>
            <form id='editForm' method="POST">
            <div class="col">
                 <h3 class="title text-center mt-2" id="produto">Code</h3> 
                <input type="text" class="form-control" name="CodeKey" id="code" placeholder="Actual Code" value=000 required/>
                <h3 class="title text-center mt-2" id="produto">Name of Product</h3> 
                <input type="text" class="form-control" name="NameKey" id="name" placeholder="Product Name" required>
            </div>
            <div class="col">
                <h3 class="title text-center mt-2">Quantity</h3>
                <input type="number" class="form-control" name="QuantityKey" id="quantity" min="0" placeholder="1" required>
                <h3 class="title text-center mt-3" id="preco">Unit Price</h3>
                    <input type="text" class="form-control" name="PriceKey" 
                    id="price" 
                    placeholder="R$0,00" 
                    required>
                    <script>
                        $(document).ready($(function(){
                            $("#price").maskMoney({prefix:'R$ ',
                                allowNegative: false, 
                                thousands:'.',
                                decimal:',', 
                                affixesStay: true})
                        }))
                    </script>
                    <button class="btn btn-danger close mt-2" name="submit" type="button" id="submit">Update</button>
                    <button class="btn btn-danger close mt-2 mx-2" type="button" id="close">Close</button>
            </div>
        </div>
       
            </form>
              
        </div>
    </div>      
</body>
<script>
        $(document).ready(function(){
            
            $('table tbody tr').click(function(){
                $('table tbody tr').not(this).removeClass('selectRow');
                $(this).addClass("selectRow");
                var name = getName($(".selectRow"));
                var code = getCode($(".selectRow"));
                console.log(code);
                $("#deletebutton").click(function(){
                    console.log(code);
                    $.ajax({
                        type:'GET',
                        url: "_phpscripts/dataDelete.php",
                        data: {Key: code},
                    })
                })
                $("#editbutton").click(function(){
                    $("#code").val(code);
                    $("#name").val(name);
                    $(".popup, .popup-content").addClass("active");
                    $("header").css('opacity','0.2');
                    $("section").css('opacity','0.2');
                    $(".popup-content").css('opacity','1');
                })
                $("#submit").click(function(){
                    $("#code").val(code);
                    $.ajax({
                        type:'POST',
                        url: "_phpscripts/dataEdition.php",
                        data:$('#editForm').serialize(),
                        success: function(data){
                            location.reload();
                        }
                        });
                    $(".popup, .popup-content").removeClass('active');
                    $("header").css('opacity','1');
                    $("section").css('opacity','1')
                    })
                $("#close").click(function(){
                    $(".popup, .popup-content").removeClass('active');
                    $("header").css('opacity','1');
                    $("section").css('opacity','1')
                })
            });
            
        });
    </script>

<script>
   
    </script>
</html>