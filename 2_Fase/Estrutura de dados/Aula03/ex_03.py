# Escreva um programa que:

# 1) Peça um verbo para um usuário
# 2) Imprima na tela ``Eu posso xxxxxxx melhor do que você!'', onde você substitui ``xxxxxxx'' pelo verbo
# 3)E depois disso escreva o verbo 5 vezes separado por espaço na linha seguinte.

verbo = str(input("Informe um verbo: "))

print(f"Eu posso {verbo} melhor do que você!")
print(f"{verbo} "*5)