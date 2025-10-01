# O restaurante a quilo Bem-Bão cobra R$ 12,00 por cada quilo de refeição. Escreva um algoritmo (encapsulado em uma função)  que leia o peso do prato montado pelo cliente (em quilos) e imprima o valor a pagar.  Assuma que a balança já desconsidere o peso do prato.

# Implemente a função de acordo com esta especificação, e use-a para gerar o programa que imprima para o usuário o valor em reais:


# def preco(p):
#     """ Entrada: Um número qualquer 'p' representando o peso em quilos.
#          Saída: Um inteiro representando o valor a pagar (em centavos).
#    """

def preco(p):
    valorPorQuilo = 12.00  
    return int(p * valorPorQuilo * 100)  

peso = float(input("Digite o peso do prato em quilos: "))
valorAPagar = preco(peso)
print(f"O valor a pagar é R$ {valorAPagar / 100:.2f}")