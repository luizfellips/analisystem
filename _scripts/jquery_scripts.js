function fadeEverythingIn(){
    $("body").hide();
    $("body").fadeIn();
  }

  
  function loadData(array){
    $("#usuario").val(array['nome']);
    $("#valor-vendido").text(array['valorVendido']);
    $('#vendas-efetuadas').text(array['vendasEfetuadas']);
    $('#dinheiro-especie').text(array['dinheiroEspecie']);
    $('#pix').text(array['pix']);
    $('#cartao').text(array['cartao']);
}