algoritmo "ex_40"
// Função : 40. Faça um programa que receba o valor dos catetos de um triângulo, calcule e mostre o valor
//da hipotenusa.
// Autor : Cristyan das Neves Silva
// Data : 20/05/2025
// Seção de Declarações 
var
cateto1, cateto2, hipotenusa: real
inicio
// Seção de Comandos 
escreva("Digite o valor do primeiro cateto: ")
leia(cateto1)
escreva("Digite o valor do segundo cateto: ")
leia(cateto2)
hipotenusa <- raizq(cateto1^2 + cateto2^2)
escreva("O valor da hipotenusa é: ", hipotenusa)
fimalgoritmo
