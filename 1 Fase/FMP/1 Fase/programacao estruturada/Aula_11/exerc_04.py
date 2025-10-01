'''4. Escrever um algoritmo que lê 5 valores para a, um de cada vez, e conta
quantos destes valores são negativos.'''
negativo=0
for num in range(1, 6):
    a=float(input(f'Digite o {num}º numero: '))
    if a<0:
        negativo+=1
print(f'O total de números negativos é: {negativo}')