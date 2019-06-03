function consultaCep(url, cep){

    oitoDigitos = /^\d{8}$/;
    apenasNumero = /\d+/g;

    if(cep.length == 0){
        alert("Digite o CEP");
        return;
    }

    if(!apenasNumero.test(cep)){
        alert("Digite apenas numeros");
        return;
    }

    if(!oitoDigitos.test(cep)){
        alert("Digite 8 digitos");
        return;
    }

    xhttp = new XMLHttpRequest();
    console.log(url+'/'+cep);
    xhttp.open("GET", url+'/'+cep, false);
    xhttp.send();
    console.log(xhttp.responseText);
    var resp = JSON.parse(xhttp.responseText);
    if(resp.status == 404){
        alert("CEP não encontrado");
        return;
    }
    document.getElementById('estado').value = resp.estado;
    document.getElementById('cidade').value = resp.cidade;
    document.getElementById('bairro').value = resp.bairro;
    document.getElementById('logradouro').value = resp.logradouro;
    console.log(xhttp.responseText);
}