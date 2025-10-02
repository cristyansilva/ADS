'''
Exercício Python 060: Faça um programa que leia um número qualquer e mostre o seu fatorial. Exemplo:
'''
from math import factorial
num = int(input('Digite um número para ver seu fatorial: '))
f = factorial(num)
print(f'O Fatorial de {num} é {f}')