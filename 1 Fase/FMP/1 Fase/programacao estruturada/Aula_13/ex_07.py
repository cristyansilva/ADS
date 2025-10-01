'''7. Construa um algoritmo que leia uma quantidade indeterminada de números
inteiros positivos e identifique qual foi o maior número digitado. O final da
série de números digitada deve ser indicado pela entrada de –1.'''

maior = None  
while True:
    num = int(input('Informe um número positivo e para parar a repetição, digite -1: '))
    if num == -1:
        break    
    if maior is None or num > maior:  
        maior = num

if maior is not None:
    print(f'O maior número digitado foi: {maior}')
else:
    print('Nenhum número válido foi digitado.')