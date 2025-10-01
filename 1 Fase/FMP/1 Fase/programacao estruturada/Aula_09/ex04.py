'''Elabore um algoritmo que leia dois números inteiros e mostre o resultado da diferença do
maior valor pelo menor;'''
print('-'*40)
print('VERIFICADOR DE DIFERENÇAS ENTRE NÚMEROS')
print('-'*40)
num1 = int(input('Digite o primeiro número: '))
num2 = int(input('Digite o segundo número: '))
print('-'*40)
if num1 > num2:
    print(f'O Resultado da diferença é: {num1-num2}')
if num2 > num1:
    print(f'O Resultado da diferença é: {num2-num1}')