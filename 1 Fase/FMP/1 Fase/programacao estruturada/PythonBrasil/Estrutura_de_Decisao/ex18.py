'''18. Faça um Programa que peça uma data no formato dd/mm/aaaa e determine se a mesma é uma data válida.'''
data = input('Digite uma data no formato dd/mm/aaaa: ')
if data[0:0] <0 and data[0:0]>10:
    print('Data Inválida')