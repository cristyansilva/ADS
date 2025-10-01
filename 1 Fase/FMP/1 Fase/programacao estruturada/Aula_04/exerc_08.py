'''Faça um algoritmo que receba o ano de nascimento de uma pessoa e o ano
atual, calcule e mostre:
a) a idade dessa pessoa em anos;
b) a idade dessa pessoa em meses;
c) a idade dessa pessoa em dias;
d) a idade dessa pessoa em semanas.'''
from datetime import date
anoNasc = int(input('Em que ano você nasceu? '))
anoAtual = date.today().year
print(f'Você tem {anoAtual-anoNasc} anos')
print(f'Você tem {(anoAtual-anoNasc)*12} meses vividos')
print(f'Você tem {(anoAtual-anoNasc) * 365} dias vividos')
print(f'Você tem {(anoAtual-anoNasc) * 52} semanas vividas')