algoritmo "ex_30"
// Função :30. Um funcionário recebe um salário fixo mais 4% de comissão sobre as vendas. Faça um
//programa que receba o salário fixo de um funcionário e o valor de suas vendas, calcule e
//mostre a comissão e o salário final do funcionário.
// Autor : Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
salarioFixo, valorVendas, comissao, salarioFinal: real
inicio
// Seção de Comandos 
escreva("Digite o salário fixo do funcionário: R$ ")
leia(salarioFixo)
escreva("Digite o valor total das vendas: R$ ")
leia(valorVendas)
comissao <- valorVendas * 0.04
salarioFinal <- salarioFixo + comissao
escreva("A comissão é de: R$ ", comissao)
escreva("\nO salário final é: R$ ", salarioFinal)
fimalgoritmo
