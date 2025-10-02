algoritmo "ex_22"
// Função : 22. Pedrinho tem um cofrinho com muitas moedas, e deseja saber quantos reais conseguiu
//poupar. Faça um algoritmo para ler a quantidade de cada tipo de moeda, e imprimir o valor total
//economizado, em reais. Considere que existam moedas de 1, 5, 10, 25 e 50 centavos, e ainda
//moedas de 1 real. Não havendo moeda de um tipo, a quantidade respectiva é zero.
// Autor :  Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
umCent, cincoCent, dezCent, vinteCincoCent, cinqCent, umReal, total: real
inicio
// Seção de Comandos 
escreva("Informe quantas moedas de 1 centavo conseguiu poupar: ")
leia(umCent)
escreva("Informe quantas moedas de 5 centavo conseguiu poupar: ")
leia(cincoCent)
escreva("Informe quantas moedas de 10 centavo conseguiu poupar: ")
leia(dezCent)
escreva("Informe quantas moedas de 25 centavo conseguiu poupar: ")
leia(vinteCincoCent)
escreva("Informe quantas moedas de 50 centavo conseguiu poupar: ")
leia(cinqCent)
escreva("Informe quantas moedas de 1 real conseguiu poupar: ")
leia(umReal)
umCent <- umCent * 0.01
cincoCent <- cincoCent * 0.05
dezCent <- dezCent * 0.1
vinteCincoCent <- vinteCincoCent * 0.25
cinqCent <- cinqCent * 0.5
umReal <- umReal * 1
total <- umCent + cincoCent + dezCent + vinteCincoCent + cinqCent + umReal
escreva("Você conseguiu poupar: R$",total," Reais")
fimalgoritmo
