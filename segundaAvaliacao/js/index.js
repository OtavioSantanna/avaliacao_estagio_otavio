function aplicarMascaraCEP(inputId) {
  const cepInput = document.getElementById(inputId);
  cepInput.addEventListener('input', function() {
    let valor = cepInput.value;
    valor = valor.replace(/\D/g, '');
    if (valor.length > 5) {
      valor = valor.substring(0, 5) + '-' + valor.substring(5, 8);
    }
    cepInput.value = valor;
  });
}
aplicarMascaraCEP('cep');


function consultarCEP() {
  var cep = document.getElementById("cep").value;
  var url = "../actions/consulta_cep.php?cep=" + cep;

  // Mostra o indicador de carregamento
  document.getElementById("loading").style.display = "block";

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById("info_cep").innerHTML = xhr.responseText;
          // Oculta o indicador de carregamento
          document.getElementById("loading").style.display = "none";
      }
  };
  xhr.open("GET", url, true);
  xhr.send();
}