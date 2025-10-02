'''Faça um algoritmo que receba o peso de uma pessoa, calcule e mostre:
a) o novo peso se a pessoa engordar 15% sobre o peso digitado;
b) o novo peso se a pessoa emagrecer 20% sobre o peso digitado.'''
peso = float(input('Qual seu peso? '))
pesoEngordou = peso * 1.15
pesoEmagreceu = peso * 0.8
print(f'Se você engordar 15% seu peso ficará: {pesoEngordou}KG.')
print(f'Se você emagrecer 20% seu peso ficará: {pesoEmagreceu}KG.')