function fadeEverythingIn(){
    $("body").hide();
    $("body").fadeIn();
  }

  
  function loadData(array){
    $("#usuario").val(array['nome']);
    $("#valor-vendido").text(array['valorVendido']);
    $('#vendas-efetuadas').text(array['vendasEfetuadas']);
    $("#abertura").text(array['abertura']);
}

function loadPrices(array){
    var id = array['id'];
    var description = array['description'];
    var price = array['price'];
    var total = array['total'];
    var quantity = array['quantity'];
    $("tbody").append(`<tr>
    <td>${id}</td>
    <td>${description}</td>
    <td>R$ ${price}</td>
    <td>${quantity}</td>
    <td>R$ ${total}</td>
    </tr>`)
    $("#unitPrice").text(`R$${price}`);
    $("#unitSum").text(`R$${total}`)
    var totalList = []
    var totalPrice = 0;
    $("#tabela-produtos tbody tr td:nth-child(5)").each(function(){
      var item = $(this).text();
      item = item.replace('R$ ','')
      item = item.replace(',','.');
      totalList.push( parseFloat(item) );
    })
    for(item of totalList){
      totalPrice += item;
    }
    totalPrice = totalPrice.toFixed(2);
    totalPrice = totalPrice.toString();
    var newPrice = totalPrice.replace('.',',');
    
    $("#total").text(`R$ ${newPrice}`);
    
}

function clearAll(){
  $("#tabela-produtos > tbody").empty();
  $("#total").text("R$0,00");
  $("#codigo").val(0);
  $("#qtd").val(0);
  $("#unitPrice").text("R$0,00");
  $("#unitSum").text("R$0,00");
}


function getName(obj){
  var firstCharOcurrence = obj.text().search(/\D/i);
  var stringStartingFromChar = obj.text().substring(firstCharOcurrence);
  var secondDigitOcurrence = stringStartingFromChar.search(/\d/);
  var name = stringStartingFromChar.substring(0,secondDigitOcurrence);
  return name;
};

function getCode(obj){
  var firstCharOcurrence = obj.text().search(/\D/i);
  var code = obj.text().substring(0,firstCharOcurrence);
  return code;
}