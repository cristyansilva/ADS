'''7. Faça um algoritmo que permita ao usuário informar a idade de quantas
pessoas ele desejar. Após isso o algoritmo deve informar a soma das
pessoas maiores de idade e a média de idade das pessoas maiores de idade
informadas'''

mediaIdade = 0 
somaIdade = 0
count = 0
while True:
    idade = int(input('Informe a idade: (Digite um valor negativo para encerrar): '))
    if idade < 0:
        break
    if idade >=18:
        somaIdade += idade
        count += 1
if count > 0:
    mediaIdade = somaIdade / count
else:
    MediaIdade = 0
print(f"A soma das pessoas maiores de idade é: {somaIdade}")
print(f"A média de idade dessas pessoas é: {mediaIdade}")