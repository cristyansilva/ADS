'''Faça um algoritmo que calcule e mostre a tabuada de um número digitado
pelo usuário.'''
valor = int(input('Digite um número para ver sua tabuada: '))
print(f'A Tabuada do número {valor} é:')
for sufixo in range(1, 11):
    print(f'{valor} x {sufixo} ={valor * sufixo}')
    