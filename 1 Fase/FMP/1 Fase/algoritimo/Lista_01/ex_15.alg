algoritmo "ex_15"
// Função : 15. Três amigos, Carlos, André e Felipe, decidiram rachar igualmente a conta de um bar. Faça
// um algoritmo para ler o valor total da conta e imprimir quanto cada um deve pagar, mas faça
// com que Carlos e André não paguem centavos. Ex: uma conta de R$1 01,53 resulta em
// R$33,00 para Carlos, R$33,00 para André e R$35,53 para Felipe.
// Autor : Cristyan das Neves Silva
// Data : 12/05/2025
// Seção de Declarações
var
valorTotal, valorCarlos, valorAndre, valorFelipe : real
parteInteira : inteiro
inicio
// Seção de Comandos
escreva("Digite o valor total da conta R$")
leia(valorTotal)
parteInteira <- (valorTotal div 3)
valorCarlos <- parteInteira
valorAndre <- parteInteira
valorFelipe <- valorTotal - (valorCarlos + valorAndre)
escreval("Carlos deve pagar: R$ ", valorCarlos)
escreval("André deve pagar: R$ ", valorAndre)
escreval("Felipe deve pagar: R$ ", valorFelipe)
fimalgoritmo
