algoritmo "ex-16"
// Função :   16. A lanchonete Gostosura vende apenas um tipo de sanduíche, cujo recheio inclui duas fatias
//de queijo, uma fatia de presunto e uma rodela de hambúrguer. Sabendo que cada fatia de
//queijo ou presunto pesa 50 gramas, e que a rodela de hambúrguer pesa 100 gramas, faça um
//algoritmo em que o dono forneça a quantidade de sanduíches a fazer, e a máquina informe as
//quantidades (em quilos) de queijo, presunto e carne necessários para compra.
// Autor : Cristyan das Neves Silva
// Data : 12/05/2025
// Seção de Declarações 
var
queijo, presunto, hamburguer: real
sanduiche: inteiro
inicio
// Seção de Comandos 
escreva("Informe a quantidade de Sanduiches que será produzida: ")
leia(sanduiche)
queijo <- 0.05 * sanduiche
presunto <- 0.05 * sanduiche
hamburguer <- 0.1 * sanduiche
escreval("Para a quantidade informada de sanduiches, será necessario a compra de: ")
escreval(queijo,"kg de Queijo")
escreval(presunto,"kg de Presunto")
escreval(hamburguer,"kg de Carne")
fimalgoritmo
