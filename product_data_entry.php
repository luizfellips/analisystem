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
        $barcode = isset($_POST["Barcode"])?$_POST["Barcode"]: "0";
        $quantity = isset($_POST["Quantity"])?$_POST["Quantity"]: "0";
        $package = $_POST["Packages"];
        $preValidity = isset($_POST["Validity"])?date_create($_POST["Validity"]): "00/00/0000";
        if($preValidity == '00/00/0000'){
            $validity = $preValidity;
        }else{
            $validity = date_format($preValidity,'d/m/Y');
            $validity_sql = date_format($preValidity,'Y-m-d');
        }
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
        <div class="container justify-content-start mx-0" id="container-marca">
            <i class="bi bi-shop"></i>
            <h2 class="title mx-1 py-3 text-center">Conveniência Rei Do Coco</h2>
        </div>
        <div class="container" id="navbar-items">
            <ul class="navbar-nav flex-row px-3 mb-3">
                <li class="nav-item px-3">
                    <a href="principal.html" class="nav-link">Principal</a>
                </li>
                <li class="nav-item dropdown px-3">
                    <a  class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        data-bs-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Estoque
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="estoque.html" aria-current="page">Novo cadastro</a>
                        <a class="dropdown-item" href="visualizar_estoque.php">Visualizar estoque</a>
                        <a class="dropdown-item" href="abastecer_estoque.html">Abastecer estoque</a>
                    </div>
                    </li>
                <li class="nav-item px-3">
                    <a href="#" class="nav-link ">Notas Fiscais</a>
                </li>
                <li class="nav-item px-3">
                    <a href="#" class="nav-link ">Consultas</a>
                </li>
                <li class="nav-item px-3">
                    <a href="usuario.html" class="nav-link ">Usuário</a>
                </li>
                <li class="nav-item px-3">
                    <a href="#" class="nav-link ">Gerenciamento</a>
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
                    <h1 class="informations text-center">Dados inseridos</h1>
                    <table class="table table-light table-striped table-hover text-center" id="tabela-produtos">
                        <thead class="table-dark" id="header-fixed">
                            <tr>
                                <th class="col">ID</th>
                                <th class="col">Nome do Produto</th>
                                <th class="col">Quantidade</th>
                                <th class="col">Pac/uni</th>
                                <th class="col">Validade</th>
                                <th class="col">Preço</th>
                                <th class="col">Fornecedor</th>
                                <th class="col">Contato</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr>
                                <th><?php echo $barcode;?></th>
                                <td><?php echo $nameOfProduct;?></td>
                                <td><?php echo $quantity;?></td>
                                <td><?php echo $package;?></td>
                                <td><?php echo $validity;?></td>
                                <td>R$ <?php echo $price;?></td>
                                <td><?php echo $providerContact;?></td>
                                <td><?php echo $providerNumber;?></td>
                            </tr>
                            <?php
                                include "php/sql.php";
                                adicionar($codigo,$nome,$qtd,$pacote,$validade_sql,$preco,$fornecedor,$contato);
                            ?>
                        </tbody>
                    </table>
                    <div class="flip-2-hor-bottom-1"><a href="estoque.html">Novo cadastro</a></div>
                </div>
            </div>
        </div>   
    </section>
</body>
</html>