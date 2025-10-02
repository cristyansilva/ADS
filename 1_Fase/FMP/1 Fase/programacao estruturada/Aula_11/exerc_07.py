'''7. Solicite que o usuário insira seu nome completo e apresente apenas o
primeiro nome.
a. Na vertical
b. Na horizontal'''
nome=str(input('Digite seu nome completo: '))
primeiroNome=nome.split()[0]
print(f'Seu primeiro nome é: {primeiroNome}')	
for letra in primeiroNome:
    print(letra)