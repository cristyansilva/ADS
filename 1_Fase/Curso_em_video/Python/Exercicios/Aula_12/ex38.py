'''Exercício Python 038: Escreva um programa que leia dois números inteiros e compare-os. mostrando na tela uma mensagem:
'''
num = int(input('Digite um número: '))
num2 = int(input('Digite outro número: '))
if num > num2:
    print(f'O Número {num} é Maior!')
elif num == num2:
    print(f'O Número {num} é igual ao número {num2}')
else:
    print(f'O número {num2} é Maior!')