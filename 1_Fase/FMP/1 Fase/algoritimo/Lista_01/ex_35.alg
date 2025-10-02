algoritmo "ex_35"
// Função :   35. Faça um programa que calcule e mostre a área de um losango. Sabe-se que: A = (diagonal
//maior * diagonal menor)/2;
// Autor : Cristyan das Neves Silva
// Data : 20/05/2025
// Seção de Declarações 
var
areaLosango, diagonalMaior, DiagonalMenor: real
inicio
// Seção de Comandos 
escreval("---------------------------------")
escreval("CALCULANDO A AREA DE UM LOSANGO")
escreval("---------------------------------")
escreva("Informe a diagonal maior: ")
leia(diagonalMaior)
escreva("Informe a diagonal menor: ")
leia(diagonalMenor)
areaLosango <- (diagonalMaior * diagonalMenor) /2
escreva("A Área do losango é de: ",areaLosango)
fimalgoritmo
