'''Crie um programa que tenha uma dupla totalmente preenchida com uma contagem por extenso, de zero até vinte. Seu programa deverá ler um número pelo teclado (entre 0 e 20) e mostrá-lo por extenso.'''
count = ('zero', 'um', 'dois', 'três', 'quatro', 'cinco', 'seis', 'sete', 'oito', 'nove', 'dez', 'onze', 'doze', 'treze', 'quatorze', 'quinze', 'dezesseis', 'dezessete', 'dezoito', 'dezenove', 'vinte')
num = 0
while num != 99:
    num = int(input('Digite um valor de 0 a 20: '))
    if 0 >= num >= 20:
        num = int(input('Digite um valor de 0 a 20: '))
    
    print(f'O valor digitado foi {count[num]}')
    
        
print('Acabou')