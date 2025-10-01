'''16. Faça um programa que calcule as raízes de uma equação do segundo grau, na forma ax2 + bx + c. O programa deverá
pedir os valores de a, b e c e fazer as consistências, informando ao usuário nas seguintes situações:
a. Se o usuário informar o valor de A igual a zero, a equação não é do segundo grau e o programa não deve fazer
pedir os demais valores, sendo encerrado;
b. Se o delta calculado for negativo, a equação não possui raizes reais. Informe ao usuário e encerre o programa;
c. Se o delta calculado for igual a zero a equação possui apenas uma raiz real; informe-a ao usuário;
d. Se o delta for positivo, a equação possui duas raiz reais; informe-as ao usuário;'''
import math
print('-='*20)
print('CALCULANDO EQUAÇÃO DE SEGUNDO GRAU')
print('-='*20)
a = float(input('Informe o valor de A (x²): '))
b = float(input('Informe o valor de B (x): '))
c = float(input('Informe o valor de C (c): '))
def calc_delta(a, b, c):
    delta = b**2 - 4*a*c
    return delta
def calcular_raizes(a, b, c):
    if delta < 0:
        return ' não há raizes reais'
    elif delta == 0:
        x = -b / (2 *a)
        return f'A raiz é: {x}'
    else:
        raiz_delta = math.sqrt(delta)
        x1 = (-b + raiz_delta) / (2*a)
        x2 = (-b - raiz_delta) / (2*a)
        return f'As raizes são x1 = {x1} e x2 = {x2}'
delta = calc_delta(a, b, c)
print(f'o Delta é: {delta}')
raizes = calcular_raizes(a, b,c )
print(raizes)