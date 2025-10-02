algoritmo "ex_29"
// Função :29. Faça um programa que receba o preço de um produto, calcule e mostre o novo preço,
//sabendo-se que este sofreu um desconto de 10%.
// Autor :           Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
preco, novoPreco: real
inicio
// Seção de Comandos 
escreva("Digite o preço do produto: R$ ")
leia(preco)
novoPreco <- preco - (preco * 0.10)
escreva("O novo preço com 10% de desconto é: R$ ", novoPreco)
fimalgoritmo
