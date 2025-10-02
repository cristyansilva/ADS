'''Crie um programa que vai ler vários números e colocar em uma lista. Depois disso, crie duas listas extras que vão conter apenas os valores pares e os valores ímpares digitados, respectivamente. Ao final, mostre o conteúdo das três listas geradas.'''
num = list()
pares = list()
impar = list()
while True:
    num.append(int(input('Digite um número: ')))
    resposta = str(input('Quer continuar? [S/N] '))
    if resposta in 'nN':
        break
for i, valores in enumerate(num):
    if valores % 2 == 0:
        pares.append(valores)
    elif valores % 2 == 1:
        impar.append(valores)
print('-' * 30)
num.sort(), pares.sort(), impar.sort()
print(f'A lista completa é {num}')
print(f'A lista de pares é {pares}')
print(f'A lista de Impares é {impar}')