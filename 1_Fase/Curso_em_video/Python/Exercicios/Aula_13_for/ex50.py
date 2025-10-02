'''Exercício Python 50: Desenvolva um programa que leia seis números inteiros e mostre a soma apenas daqueles que forem pares.
 Se o valor digitado for ímpar, desconsidere-o.'''    
soma = 0
count = 0
for laco in range(1,3):
    num = int(input(f'Digite o {laco}º número: '))
    if num % 2 == 0:
        soma += num
        count += 1     
print(f'Você informou {count} números *PARES* e a soma deles é {soma}')