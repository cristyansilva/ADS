'''Três amigos, Carlos, André e Felipe. decidiram rachar igualmente a conta de um bar.
Faça um algoritmo para ler o valor total da conta e imprimir quanto cada um deve pagar.
mas faça com que Carlos e André não paguem centavos. Ex: uma conta de R$101,53 resulta em 
R$33,00 para Carlos, 
R$33,00 para André e 
R$35,53 para Felipe.'''
total_conta = float(input('Digite o Total da conta de Carlos, André e Felipe: R$'))
parte_inteira = int(total_conta // 3)
parte_felipe = total_conta - (2 * parte_inteira)
'''
print(parte_inteira)
print(parte_felipe)
'''
print(f'A parte de Carlos ficou: R${parte_inteira:.2f}')
print(f'A parte de André ficou: R${parte_inteira:.2f}')
print(f'A parte de Felipe ficou: R${parte_felipe:.2f}')
