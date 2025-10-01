'''Exercício 1:
Escreva um algoritmo que leia as idades de 2 homens e de 2 mulheres (considere que as
idades dos homens serão sempre diferentes entre si, bem como as das mulheres). Calcule
e escreva a 
soma das idades do homem mais velho com a mulher mais nova, 
e o produto das idades do homem mais novo com a mulher mais velha.'''
idadeM1 = int(input('Qual a idade do primeiro homem: '))
idadeM2 = int(input('Qual a idade do segundo homem: '))
idadeF1 = int(input('Qual a idade da primeira mulher: '))
idadeF2 = int(input('Qual a idade da segunda mulher: '))
if idadeM1 > idadeM2 and idadeF1 < idadeF2:
    print(f'A soma do homem mais velho com a mulher mais nova é: {idadeM1 + idadeF1}')
elif idadeM2 > idadeM1 and idadeF2 < idadeF1:
    print(f'A soma do homem mais velho com a mulher mais nova é: {idadeM2 + idadeF2}')
if idadeM1 < idadeM2 and idadeF1 > idadeF2:
    print(f'O produto das idades do homem mais novo com a mulher mais velha é: {idadeM1 * idadeF1}')
elif idadeM2 < idadeM1 and idadeF2 > idadeF1:
    print(f'O produto das idades do homem mais novo com a mulher mais velha é: {idadeM2 * idadeF1}')