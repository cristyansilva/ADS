algoritmo "ex_39"
// Função : 39. S. João recebeu seu salário e precisa pagar duas contas que estão atrasadas. Como as
//contas estão atrasadas, João terá de pagar multa de 2% sobre cada conta. Faça um programa
//que calcule e mostre quanto restará do salário do João
// Autor : Cristyan das Neves Silva
// Data : 20/05/2025
// Seção de Declarações 
var
salario,conta1,conta2 multa, salarioRestante: real
inicio
// Seção de Comandos 
escreva("Informe seu salário: ")
leia(salario)
escreva("Informe o valor da primeira conta: ")
leia(conta1)
escreva("Informe o valor da segunda conta: ")
leia(conta2)
conta2 <- conta2 * 1.02
conta1 <- conta1 * 1.02
salarioRestante <- salario - conta1 - conta2
escreva("Após pagar suas contas restará: ", salarioRestante," Reais")
fimalgoritmo
