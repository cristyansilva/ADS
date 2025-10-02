'''2. Escrever um algoritmo que leia uma quantidade de números que deve ser
lidos e conte quantos deles estão nos seguintes intervalos: [0.25], [26,50],
[51,75] e [76,100].'''
grupo1 = 0
grupo2 = 0
grupo3 = 0
grupo4 = 0

while True:
    num = int(input('Informe um Número de 0 a 100: '))
    if num >= 0 and num <= 25:
        grupo1 += 1
    elif num >= 26 and num <= 50:
        grupo2 += 1
    elif num >= 51 and num <= 75:
        grupo3 += 1
    elif num >= 76 and num <= 100:
        grupo4 += 1

    continua = str(input("Deseja informar outro numero? [S/N] ")).upper()
    if continua == 'N':
        break

print(f"Quantidade no intervalo [0,25]: {grupo1}")
print(f"Quantidade no intervalo [26,50]: {grupo2}")
print(f"Quantidade no intervalo [51,75]: {grupo3}")
print(f"Quantidade no intervalo [76,100]: {grupo4}")