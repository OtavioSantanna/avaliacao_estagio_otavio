const teste = [5, 3, 4, 3, 5, 5, 3];
let numerosNaoRepetidos = [];

for (let i = 0; i < teste.length; i++) {
    let repetido = false;
    for (let n = 0; n < teste.length; n++) {
        if (i !== n && teste[i] === teste[n]) {
            repetido = true;
            break;
        }
    }
    if (!repetido) {
        numerosNaoRepetidos.push(teste[i]);
    }
}

console.log(numerosNaoRepetidos);