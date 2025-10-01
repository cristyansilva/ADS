Algoritmo "Exercicio_72"
Var
   votosA, votosB, votosC, nulos, branco, total: inteiro
   percValidos, percA, percB, percC, percNulos, percBranco: real
Inicio
   leia(votosA, votosB, votosC, nulos, branco)
   total <- votosA + votosB + votosC + nulos + branco
   percValidos <- (votosA + votosB + votosC) * 100 / total
   percA <- votosA * 100 / total
   percB <- votosB * 100 / total
   percC <- votosC * 100 / total
   percNulos <- nulos * 100 / total
   percBranco <- branco * 100 / total

   escreval("Total de eleitores: ", total)
   escreval("% votos validos: ", percValidos)
   escreval("% votos A: ", percA)
   escreval("% votos B: ", percB)
   escreval("% votos C: ", percC)
   escreval("% votos nulos: ", percNulos)
   escreval("% votos em branco: ", percBranco)
Fimalgoritmo