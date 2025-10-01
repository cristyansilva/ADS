'''3. Escreva um algoritmo que leia um valor inicial A e imprima a sequência de
valores do cálculo de A! e o seu resultado. Ex: 5! = 5 X 4 X 3 X 2 X 1 = 120'''
fatorar=int(input('Digite um número inteiro positivo: '))
fatorial=1
print(f'{fatorar}! = ', end='')
for i in range(fatorar, 0, -1):
    fatorial*=i
    if i==fatorar:
        print(i, end='')
    else:
        print(f' X {i}', end='')
print(f' = {fatorial}')