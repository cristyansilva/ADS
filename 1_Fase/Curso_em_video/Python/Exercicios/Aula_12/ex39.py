'''Exercício Python 39: Faça um programa que leia o ano de nascimento de um jovem e informe, de acordo com a sua idade, se ele ainda vai se alistar ao serviço militar, se é a hora exata de se alistar ou se já passou do tempo do alistamento. Seu programa também deverá mostrar o tempo que falta ou que passou do prazo.
'''
from datetime import date
ano_nasc = int(input('Ano de nascimento: '))
ano_atual = date.today().year
print(f'Quem nasceu em, {ano_nasc} tem {ano_atual - ano_nasc} em {ano_atual}')
if ano_nasc < 2007:
    print(f'Você já deveria ter se alistado há {2025 - ano_nasc - 18} anos.')
elif  ano_nasc == 2007:
    print('Você tem que se alistar este ano!')
elif ano_nasc > 2007:
    print(f'Você deve se alistar em {ano_nasc + 18}')