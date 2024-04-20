var tamanho = 6;
const resultado = [0,1];

for(let i=2;i<tamanho; i++){
    resultado.push(resultado[i-1]+resultado[i-2]);
}
console.log(resultado);