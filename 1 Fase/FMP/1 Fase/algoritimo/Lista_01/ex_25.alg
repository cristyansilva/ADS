algoritmo "ex_25"
// Função :25. Calcule o volume de uma caixa d&#39;água cilíndrica.
// Autor : Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
raio, altura, volume: real
pi: real
inicio
// Seção de Comandos 
 pi <- 3.1416

escreva("Digite o raio da base da caixa d'água (em metros): ")
leia(raio)
escreva("Digite a altura da caixa d'água (em metros): ")
leia(altura)
volume <- pi * (raio ^ 2) * altura
escreval("O volume da caixa d'água é: ", volume, " metros cúbicos")
escreval("O volume em litros é: ", volume * 1000, " litros")
fimalgoritmo
