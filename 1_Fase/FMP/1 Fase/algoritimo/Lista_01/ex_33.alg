algoritmo "ex_33"
// Função : 33. Faça um programa que calcule e mostre a área de um trapézio. Sabe-se que: A = (base
//maior + base menor) * altura)/2 ;
// Autor : Cristyan das Neves Silva
// Data : 20/05/2025
// Seção de Declarações 
var
areaTrapezio, baseMaior, baseMenor, altura: real
inicio
// Seção de Comandos 
escreval("--------------------------------")
escreval("CALCULANDO AREA DE UM TRAPEZIO")
escreval("--------------------------------")
escreva("Informe a base maior: ")
leia(baseMaior)
escreva("Informe a base menor: ")
leia(baseMenor)
escreva("Informe a altura: ")
leia(altura)
areaTrapezio <- (baseMaior+baseMenor)* altura /2
escreva("A área desse trapézio é de : ",areaTrapezio,"cm³")
fimalgoritmo
