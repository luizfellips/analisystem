  function mascarar(objeto,funcao) {
    setTimeout(function(){
      var valor = funcao(objeto.value);
      if (valor != objeto.value){
        objeto.value = valor;
      }
    },1);
  }

  function mascararTelefone(object) {
    var valorMascarado = object.replace(/\D/g, "");
    valorMascarado = valorMascarado.replace(/^0/, "");
    if (valorMascarado.length > 10) {
      valorMascarado = valorMascarado.replace(/^(\d{2})(\d{5})(\d{4}).*/,"($1) $2-$3");
    }
    else if (valorMascarado.length > 5) {
      valorMascarado = valorMascarado.replace(/^(\d{2})(\d{4})(\d{0,4}).*/,"($1) $2-$3");
    }
    else if(valorMascarado.length > 2) {
      valorMascarado = valorMascarado.replace(/^(\d{2})(\d{0,5})/,"($1) $2");
    }
    else {
      valorMascarado = valorMascarado.replace(/^(\d*)/, "($1")
    }
    return valorMascarado;
  }


 