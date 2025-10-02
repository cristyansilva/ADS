Algoritmo "Exercicio_74"
Var
   distanciaKM, tempoMIN, velocidade: real
Inicio
   leia(distanciaKM, tempoMIN)
   velocidade <- (distanciaKM * 1000) / (tempoMIN * 60)
   escreval("Velocidade m/s: ", velocidade)
Fimalgoritmo