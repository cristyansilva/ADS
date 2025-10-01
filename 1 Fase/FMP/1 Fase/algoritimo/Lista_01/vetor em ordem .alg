Algoritmo "OrdenarVetor"
Var
X: vetor[1..20] de inteiro
i, j, aux: inteiro
Inicio
   // Entrada manual dos 20 valores
   escreval("Digite 20 números inteiros:")
   para i de 1 ate 20 faca
      escreva("X[", i, "] = ")
      leia(X[i])
   fimPara

   escreval("")
   escreval("Vetor original:")
   para i de 1 ate 20 faca
      escreva(X[i], " ")
   fimPara
   escreval("")

   // Bubble Sort
   para i de 1 ate 19 faca
      para j de 1 ate 20 - i faca
         se X[j] > X[j+1] entao
            aux <- X[j]
            X[j] <- X[j+1]
            X[j+1] <- aux
         fimSe
      fimPara
   fimPara

   escreval("Vetor ordenado em ordem crescente:")
   para i de 1 ate 20 faca
      escreva(X[i], " ")
   fimPara

Fimalgoritmo

