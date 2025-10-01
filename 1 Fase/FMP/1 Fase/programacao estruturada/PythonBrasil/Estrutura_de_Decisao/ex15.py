'''Faça um Programa que peça os 3 lados de um triângulo. O programa deverá informar se os valores podem ser um
triângulo. Indique, caso os lados formem um triângulo, se o mesmo é: equilátero, isósceles ou escaleno.
Dicas:
Três lados formam um triângulo quando a soma de quaisquer dois lados for maior que o terceiro;
Triângulo Equilátero: três lados iguais;
Triângulo Isósceles: quaisquer dois lados iguais;
Triângulo Escaleno: três lados diferentes;'''
print('-=' * 20)
print('Analisador de Triângulos')
print('-='* 20)
r1 = float(input('Primeiro Segmento: '))
r2 = float(input('Segundo Segmento: '))
r3 = float(input('Terceiro Segmento: '))
if r1 < r2 + r3 and r2 < r1 + r3 and r3 < r1 + r2:
    print('Os segmentos podem formar triangulos!')
    if r1 == r2 == r3:
        print('É um Triângulo Equilátero')
    elif r1 == r2 != r3 and r1 == r3 != r2 and r2 == r3 != r1:
        print('É um Triângulo Isósceles')
    elif r1 != r2 != r3:
        print('É um Triângulo Escaleno')
else:
    print('Os segmentos não podem formar um Triângulo.')
