'''Chico tem 1,50m e cresce 2 centímetros por ano, enquanto Juca tem 1,10m e cresce 3 centímetros por ano. Construir um algoritmo que calcule e imprima quantos anos serão necessários para que Juca seja maior que Chico.
'''
alturaChico = 1.50
alturaJuca = 1.10
crescimentoChico = 0.02
crescimentoJuca = 0.03
anos = 0
while alturaJuca <= alturaChico:
    alturaChico += crescimentoChico
    alturaJuca += crescimentoJuca
    anos += 1
print(f'Serão necessários {anos} anos para que Juca seja maior que Chico.')