algoritmo "ex_27"
// Função :27. Faça um programa que receba dois números, calcule e mostre a divisão do primeiro
//número pelo segundo. Sabe-se que o segundo número não pode ser zero, portanto não é
//necessário se preocupar com validações.
// Autor : Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
num1, num2, resultado: real
inicio
// Seção de Comandos 
escreva("Digite o primeiro número: ")
leia(num1)
escreva("Digite o segundo número (diferente de zero): ")
leia(num2)
resultado <- num1 / num2
escreva("O resultado da divisão é: ", resultado)
fimalgoritmo
