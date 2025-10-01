print('Cálculo de IMC')
altura = float(input('Digite Sua Altura: '))
peso = float(input('Digite Seu Peso: '))
imc = peso / (pow(altura, 2))

if imc < 18.5:
    print('Seu IMC é considerado ABAIXO DO PESO!')
elif imc >= 18.5 and imc < 25:
    print('Seu IMC é considerado NORMAL!')
elif imc >= 25 and imc < 30:
    print('Seu IMC é considerado SOBREPESO!')
elif imc >= 30 and imc < 35:
    print('Seu IMC é considerado OBESIDADE GRAU 1!')
elif imc >= 35 and imc < 40:
    print('Seu IMC é considerado OBESIDADE GRAU 2!')
elif imc >40:
    print('Seu IMC é considerado OBESIDADE GRAU 3!')
else:
    print('Verifique os dados informados!')