algoritmo "ex_24"
// Função :24. Um tonel de refresco é feito com 8 partes de água mineral e 2 partes de suco de maracujá.
//Faça um algoritmo para calcular quantos litros de água e de suco são necessários para se
//fazer X litros de refresco (informados pelo usuário).
// Autor : Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
refresco, agua, suco: real
inicio
// Seção de Comandos 
escreva("Informe quantos Litros de Refresco você deseja preparar: ")
leia(refresco)
agua <- refresco * 8/10
suco <- refresco * 2/10
escreval("Para fazer ",refresco,"L de Refresco, será necessário: ",agua,"L de Água Mineral")
escreva("e ",suco,"L de suco de maracujá.")
fimalgoritmo
