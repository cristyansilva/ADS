'''
Exercício Python 58: Melhore o jogo do DESAFIO 28 onde o computador vai “pensar” em um número entre 0 e 10. Só que agora o jogador vai tentar adivinhar até acertar, mostrando no final quantos palpites foram necessários para vencer.
'''
from random import randint
computador = randint(0,10)
print('='*60)
print('Pensei em um número entre 0 e 10, tente adivinhar...')
print('='*60)
print('Sera que consegue adivinhar qual foi? ')
print('Processando...')
acertou = False
palpites = 0
while not acertou:
    jogador = int(input('Qual o seu palpite? '))
    palpites += 1
    if jogador == computador:
        acertou = True
    else:
        if jogador < computador:
            print('Mais... Tente novamente..')
    if jogador > computador:
        print('Menos... tente novamente...')
print(f'Você Acertou com {palpites} tentativa(s)! Parabéns.')