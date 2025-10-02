'''
Exercício Python 059: Crie um programa que leia dois valores e mostre um menu na tela:
'''
from time import sleep
num1 = int(input('Digite um valor: '))
num2 = int(input('Digite outro valor: '))
opcao = 0
while opcao != 5:
    print('''
    [1] somar
    [2] multiplicar
    [3] maior
    [4] novos números
    [5] sair do programa''')
    opcao = int(input('>>>>>>>>>>>Qual é a sua opção? '))
    if opcao == 1:
        print(f'a soma de {num1}+{num2} é {num1+num2}')
        print('-'*20)
    elif opcao == 2:
        print(f'O Resultado de {num1}x{num2} é {num1*num2}')
    elif opcao == 3:
        if num1 > num2:
            print(f'O Número {num1} é maior!')
        else:
            print(f'O Número {num2} é Maior!')
    elif opcao == 4:
        print('Informe os números novamente: ')
        num1 = int(input('Primeiro valor: '))
        num2 = int(input('Segundo valor: '))
    elif opcao == 5:
        print('Finalizando....')
    else:
        print('Opção inválida, tente novamente.')  
    print('=-='*10)    
    sleep(2)
print('Fim do programa! Volte sempre!')