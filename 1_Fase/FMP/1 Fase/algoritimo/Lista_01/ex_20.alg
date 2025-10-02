algoritmo "ex_20"
// Função :20. Uma confecção produz X blusas de lã e para isto gasta uma certa quantidade de novelos.
//Faça um algoritmo para calcular quantos novelos de lã ela gasta por blusa.
// Autor :  Cristyan das Neves Silva
// Data : 12/05/2025
// Seção de Declarações 
var
totalBlusas, totalNovelos, novelosPorBlusa: real
inicio
// Seção de Comandos 
escreva("Digite a quantidade de blusas produzidas:")
leia(totalBlusas)
escreva("Digite a quantidade total de novelos usados:")
leia(totalNovelos)
se totalBlusas > 0 entao
   novelosPorBlusa <- totalNovelos / totalBlusas
   escreva ("Cada blusa consome", novelosPorBlusa, " novelos de lã.")
senao
     escreva ("A quantidade de blusas deve ser maior que zero.")
FimSe
fimalgoritmo
