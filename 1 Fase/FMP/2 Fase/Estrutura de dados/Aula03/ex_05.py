import random
numSecreto = random.randint(0,11)
num = None

while num != numSecreto:
    num = int(input(f"Adivinhe um número de 0 a 10: "))
    if num == numSecreto:
        print(True)
    else:
        print(False)
    print("--------------------")
    if num == numSecreto:
        print("Você acertou o número!")
    elif num > numSecreto:
        print("O número informado foi maior que o número sorteado!")
    elif num < numSecreto:
        print("O número informado foi menor que o número sorteado!")