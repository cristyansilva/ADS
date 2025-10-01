algoritmo "ex_19"
// Função :19. A granja Frangotech possui um controle automatizado de cada frango da sua produção. No
//pé direito do frango há um anel com um chip de identificação; no pé esquerdo são dois aneis
//para indicar o tipo de alimento que ele deve consumir. Sabendo que o anel com chip custa
//R$4,00 e o anel de alimento custa R$3,50, faça um algoritmo para calcular o gasto total da
//granja para marcar todos os seus frangos.
// Autor :  Cristyan das Neves Silva
// Data : 12/05/2025
// Seção de Declarações 
var
qtdFrangos: inteiro
 anelChip, anelAlimento, custoTotal: real
inicio
// Seção de Comandos 
escreval("Informe a quantidade de frangos para ver quantos chips serão necessarios: ")
leia(qtdFrangos)
anelChip <- qtdFrangos * 4
anelAlimento <- qtdFrangos * 3.5
custoTotal <-anelChip + anelAlimento
escreva("Para marcar todos os ",qtdFrangos," frangos, terá um custo de: R$",custoTotal," Reais")
fimalgoritmo
