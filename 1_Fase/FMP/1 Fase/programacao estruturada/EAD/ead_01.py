'''Faça um resumo sobre o conceito de Estrutura de Dados de algoritmo.
Resumo ↓ 

Conceito fundamental: 
Estruturas de Dados: São formas organizadas de armazenar e gerenciar dados na memória para acesso e manipulação eficientes.
Algoritmos: São sequências lógicas de passos para resolver um problema ou realizar uma tarefa, muitas vezes operando sobre estruturas de dados.
'''
''' Traga um exercício explicando linha a linha de comando, como exemplo. ↓ '''
from random import randint   #importando método randint na biblioteca random
computador = randint(0,10)  # a variavel computador está recebendo um "sorteio" de um número de 0 a 10
print('='*60)  #linha separatória
print('Pensei em um número entre 0 e 10, tente adivinhar...')  # saindo uma string
print('='*60)  #linha separatória
print('Sera que consegue adivinhar qual foi? ') #saindo uma string
print('Processando...') #saindo uma string
acertou = False # variavel acertou recebe falso
palpites = 0 #total de palpites é zero
while not acertou: #enquanto não acertar então
    jogador = int(input('Qual o seu palpite? ')) #variavel jogador recebe uma entrada do tipo inteiro
    palpites += 1 # contagem de palpites
    if jogador == computador:  #se o palpite do jogador for igual ao "sorteio" do computador então
        acertou = True #acertou recebe verdadeiro 
    else: #se não então
        if jogador < computador:  #se a variavel jogador for menor que a variavel computador então
            print('Mais... Tente novamente..') #saida de uma string
    if jogador > computador: #se a variavel jogador for maior que a variavel computador então
        print('Menos... tente novamente...') #saida de uma string
print(f'Você Acertou com {palpites} tentativa(s)! Parabéns.') # saida de uma string informando quantas tentativas foram utilizadas para acertar o numero sorteado pelo computador