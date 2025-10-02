algoritmo "ex_38"
// Função : 38. Faça um programa que receba o ano de nascimento de uma pessoa e o ano atual, calcule
//e mostre:
//a) a idade dessa pessoa em anos;
//b) a idade dessa pessoa em meses;
//c) a idade dessa pessoa em dias;
//d) a idade dessa pessoa em semanas.
// Autor :  Cristyan das Neves Silva
// Data : 20/05/2025
// Seção de Declarações 
var
anoNasc, anoAtual, idadeAnos, idadeMeses, idadeDias, idadeSemanas: real
inicio
// Seção de Comandos 
escreva("Informe seu ano de nascimento: ")
leia(anoNasc)
escreva("Informe o Ano Atual: ")
leia(anoAtual)
idadeAnos <- anoAtual-anoNasc
escreval("Você tem ", idadeAnos, "anos")
idadeMeses <- idadeAnos/12
escreval("Você tem ",idadeMeses," meses")
idadeDias <- idadeAnos / 365
escreval("Você tem ", idadeDias, "Dias")
idadeSemanas <- idadeAnos / 52
escreval("Você tem ", idadeSemanas, "Semanas")
fimalgoritmo
