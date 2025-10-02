algoritmo "ex_23"
//23. Num dia de sol, você deseja medir a altura de um prédio, porém, a trena não é
//suficientemente longa. Assumindo que seja possível medir sua sombra e a do prédio no chão, e
//que você lembre da sua altura, faça um algoritmo para ler os dados necessários e calcular a
//altura do prédio.
// Autor :  Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
altura, sombra, predio: real

inicio
// Seção de Comandos 
escreva("Informe sua altura: ")
leia(altura)
escreval("Informe quantas sombras foram necessárias para chegar no fim da sombra do predio: ")
leia(sombra)
predio <- altura * sombra
escreva("A altura aproximada do prédio é de: ",predio," metros")
fimalgoritmo
