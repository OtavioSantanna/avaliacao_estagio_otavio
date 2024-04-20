/*Mostra em ordem crescente*/
const numeros = [3, 1, 2, 4, 6, 5];
const numerosPares = [];
const numerosImpares = [];

for (let i = 0; i < numeros.length; i++) {
    if (numeros[i] % 2 === 0) {
        numerosPares.push(numeros[i]);
    } else {
        numerosImpares.push(numeros[i]);
    }
}
const numerosOrdenados = numerosPares.concat(numerosImpares);
console.log(numerosOrdenados);
