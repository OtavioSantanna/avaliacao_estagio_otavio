let palavra = 'arara';
let palindromo = false;

if(palavra == palavra.split('').reverse().join('')){
    palindromo = true;
    console.log(palindromo);
}else{
    palindromo = false;
    console.log(palindromo);
}