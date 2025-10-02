# Escreva um programa que:

# 1) Salva um número secreto em uma variável
# 2) Pede para o usuário adivinhar o número
# 3) Imprime 'True' ou 'False' dependendo do usuário ter adivinhado corretamente ou não.
# 4) Se o usuário errou, o programa deve avisar se o número correto é maior ou menor que o número dito pelo usuário.
import random
numSecreto = random.randint(0,11)
num = None

while num != numSecreto:
    num = int(input(f"Adivinhe um número de 0 a 10: "))
    if num == numSecreto:
        print(True)
    else:
        print(False)
    if num == numSecreto:
        print("Você acertou o número!")
    elif num > numSecreto:
        print("O número informado foi maior que o número sorteado!")
    elif num < numSecreto:
        print("O número informado foi menor que o número sorteado!")