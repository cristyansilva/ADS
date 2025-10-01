'''2. Faça um programa que calcule e escreva a seguinte soma: soma = 1/1 + 3/2
+ 5/3 + 7/4 + Desenvolver um algoritmo que efetue a soma de todos os
números ímpares que são múltiplos de três e que se encontram no conjunto
do... + 99/50'''

'''2. Faça um programa que calcule e escreva a seguinte soma: 
soma = 1/1 + 3/2 + 5/3 + 7/4 + ... + 99/50'''

numerador = 1
denominador = 1
soma = 0
while numerador <= 99 and denominador <= 50:
    soma += numerador / denominador
    numerador += 2  
    denominador += 1  
print(f"A soma da série é: {soma:.2f}")