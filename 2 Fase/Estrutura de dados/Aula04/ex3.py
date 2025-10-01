# Escreva uma função que testa se um número é primo ou não. Use ela para escrever umn programa que imprime os primeiros 100 números primos.

def primo(numero):
    if numero < 2:
        return False
    for i in range(2, int(numero**0.5) + 1):
        if numero % i == 0:
            return False
    return True

def primeiros_100_primos():
    contador = 0
    numero = 2
    while contador < 100:
        if primo(numero):
            print(numero, end=" ")
            contador += 1
        numero += 1

primeiros_100_primos()


