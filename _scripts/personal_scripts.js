  function mascarar(objeto,funcao) {
    setTimeout(function(){
      var valor = funcao(objeto.value);
      if (valor != objeto.value){
        objeto.value = valor;
      }
    },1);
  }

  function mascararTelefone(object) {
    // faz uma busca global e substitui todas as letras por espaços vazios
    var valorMascarado = object.replace(/\D/g, "");
    valorMascarado = valorMascarado.replace(/^0/, "");
    // se o tamanho do número for maior que 10
    if (valorMascarado.length > 10) {
      //primeiros 2 digitos separados em 1 parte, separa a primeira sequencia de 5 digitos em 1 parte, separa a segunda sequencia de 4 digitos em outra parte, e então formata a string original
      valorMascarado = valorMascarado.replace(/^(\d{2})(\d{5})(\d{4}).*/,"($1) $2-$3");
    }
    // se o tamanho do número for maior que 5
    else if (valorMascarado.length > 5) {
      //primeiros 2 digitos separados em 1 parte, separa a primeira sequencia em uma parte de 4 dígitos, separa a segunda parte em uma parte de 0 a 4 dígitos, então formatar a string original
      valorMascarado = valorMascarado.replace(/^(\d{2})(\d{4})(\d{0,4}).*/,"($1) $2-$3");
    }
    // se o tamanho do número for maior que 2
    else if(valorMascarado.length > 2) {
      // primeiros 2 dígitos separados em 1 parte, separa a primeira sequencia que possua entre 0 dígitos a 5 dígitos e então formata a string original
      valorMascarado = valorMascarado.replace(/^(\d{2})(\d{0,5})/,"($1) $2");
    }
    // se for menor que 2
    else {
      //separa o primeiro dígito, coloca um parentese atrás dele
      valorMascarado = valorMascarado.replace(/^(\d*)/, "($1")
    }
    return valorMascarado;
  }


 