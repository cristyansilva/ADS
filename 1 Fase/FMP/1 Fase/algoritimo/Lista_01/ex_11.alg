//11. Uma fábrica controla o tempo de trabalho sem acidentes pela quantidade de dias. Faça um
//algoritmo para converter este tempo em anos, meses e dias. Assuma que cada mês possui
//sempre 30 dias.
algoritmo " "
// Autor :  Cristyan das Neves Silva
// Data : 12/05/2025
// Seção de Declarações 
var
tempoSemAcidente, dias, mes, ano, resto:inteiro

inicio
// Seção de Comandos 
escreval("Informe quantos DIAS estão sem acidentes para ver a conversão para ano/mes: ")
leia(tempoSemAcidente)
ano <- tempoSemAcidente div 360
resto <- tempoSemAcidente mod 360
mes <- resto div 30
dias <- resto mod 30
escreval("Tempo sem acidentes: ", ano, " ano(s), ", mes, " mês(s) e ", dias, " dia(s).")
fimalgoritmo
