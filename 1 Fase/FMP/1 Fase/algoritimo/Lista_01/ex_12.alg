//12. Faça um algoritmo para ler o salário de um funcionário e aumentá-lo em 15%. Após o
//aumento, desconte 8% de impostos. Imprima o salário inicial, o salário com o aumento e o
//salário final.
algoritmo " "
// Autor : Cristyan das Neves Silva
// Data : 12/05/2025
// Seção de Declarações 
var
salarioInicial, salarioAumento, salarioFinal: real
inicio
// Seção de Comandos 
escreva("Informe o salario do funcionario: ")
leia(salarioInicial)
salarioAumento <- salarioInicial * 1.15
salarioFinal <- salarioAumento * 0.92
escreval("O salário inicial é: R$", salarioInicial)
escreval("O salário com aumento de 15% ficou: R$",salarioAumento)
escreval("O salário final ficou: R$",salarioFinal)
fimalgoritmo
