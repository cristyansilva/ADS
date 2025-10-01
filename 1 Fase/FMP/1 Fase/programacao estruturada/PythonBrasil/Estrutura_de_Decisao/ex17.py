'''Faça um Programa que peça um número correspondente a um determinado ano e em seguida informe se este ano é ou
não bissexto.'''
from datetime import date  # importa a biblioteca para obter o ano atual

ano = int(input(
    'Digite um ano para ver se ele é bissexto, ou deixe em branco para o ano atual:  '))
if ano == 0:
    ano = date.today().year
if ano % 4 == 0 and ano % 100 != 0 or ano % 400 == 0:
    print(f'O ano {ano} é \033[32mBISSEXTO\033[0m.')
else:
    print(f'O Ano {ano} \033[31mNÃO É BISSEXTO\033[0m.')
