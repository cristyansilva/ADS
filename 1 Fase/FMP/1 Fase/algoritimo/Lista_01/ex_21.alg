algoritmo "ex_21"
// Função : 21. A fábrica de refrigerantes Meia-Cola vende seu produto em três formatos: lata de 350 ml,
//garrafa de 600 ml e garrafa de 2 litros. Se um comerciante compra uma determinada
//quantidade de cada formato, faça um algoritmo para calcular quantos litros de refrigerante ele
//comprou.
// Autor : Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
lata: inteiro
garrafa600: inteiro
garrafa2l: inteiro
litros:real
inicio
// Seção de Comandos 
escreva("Informe quantas Latas de refrigerantes foram compradas: ")
leia(lata)
escreva("Informe quantas Garrafas 600ml de refrigerantes foram compradas: ")
leia(garrafa600)
escreva("Informe quantas Garrafas 2l de refrigerantes foram compradas: ")
leia(garrafa2l)
litros <- (lata*0.35)+(garrafa600*0.6)+(garrafa2l*2)
escreva("Foram comprados: ",litros,"L de refrigerantes.")
fimalgoritmo
