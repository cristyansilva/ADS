'''Elaborar um algoritmo que lê 2 valores a e b e os escreve com a mensagem:
"São múltiplos" ou "Não são múltiplos"'''
a = int(input('Digite o valor de a: '))
b = int(input('Digite o valor de b: '))
if a % b == 0 or b % a ==0:
    print('São Multiplos')
else:
    print('Não são multiplos')