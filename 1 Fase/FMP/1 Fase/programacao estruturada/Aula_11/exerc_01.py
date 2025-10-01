'''1. Desenvolver um algoritmo que leia a altura de 15 pessoas. Este programa
deverá calcular e mostrar :
a. A menor altura do grupo;
b. A maior altura do grupo;'''
menorAltura=0
maiorAltura=0
for i in range(1, 16):
    altura=float(input(f'Digite a altura da {i}ª pessoa: '))
    if i==1:
        menorAltura=altura
        maiorAltura=altura
    else:
        if altura<menorAltura:
            menorAltura=altura
        if altura>maiorAltura:
            maiorAltura=altura
print(f'A menor altura do grupo é: {menorAltura}')
print(f'A maior altura do grupo é: {maiorAltura}')
