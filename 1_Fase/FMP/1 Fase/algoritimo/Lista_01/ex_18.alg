algoritmo "ex_18"
// Função :  18. A empresa Hipotheticus paga R$10,00 por hora normal trabalhada, e R$15,00 por hora
//extra. Faça um algoritmo para calcular e imprimir o salário bruto e o salário líquido de um
//determinado funcionário. Considere que o salário líquido é igual ao salário bruto, descontando-
//se 10% de impostos.
// Autor : Cristyan das Neves Silva
// Data : 12/05/2025
// Seção de Declarações 
var
horaNormal, horaExtra, salarioBruto, salarioLiquido, descontos: real
inicio
// Seção de Comandos 
escreva("Informe quantas horas o funcionario trabalhou: ")
leia(horaNormal)
escreva("Informe quantas horas extras o funcionario fez: ")
leia(horaExtra)
horaNormal <- horaNormal * 10
horaExtra <- horaExtra * 15
salarioBruto <- (horaNormal + horaExtra)
salarioLiquido <- salarioBruto * 0.9
escreval("O Salario Bruto do funcionario é: R$",salarioBruto)
escreval("O Salario Liquido do funcionario é: R$",salarioLiquido)
fimalgoritmo
