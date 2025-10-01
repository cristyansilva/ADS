print("-"*40)
print('3. Faça um algoritmo que leia 10 números inteiros e calcule o somatório dos')
print('números negativos.')
print("-"*40)
somatorio = 0
for numeros in range(1,11):
    num = int(input('Informe um número: '))
    if num < 0:
        somatorio = somatorio + num
print(f"O somatório de numeros negativos foi de: {somatorio}")