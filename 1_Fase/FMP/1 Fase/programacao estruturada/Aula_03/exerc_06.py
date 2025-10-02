'''A empresa Hipotheticus paga R$10,00 por hora normal trabalhada, e R$15,00 por hora extra. 
Faça um algoritmo para calcular e imprimir o salário bruto e o salário líquido 
de um determinado funcionário. 
Considere que o salário líquido é igual ao salário bruto descontando-se 10% de impostos.'''
horas = float(input('Digite quantas horas o funcionário trabalhou esse mês: '))
horas_extra = float(input('Digite quantas horas extras o funcionário fez este mês: '))
salario_bruto = (10 * horas) + (15 * horas_extra)
salario_liquido = salario_bruto - (salario_bruto * 0.1)
print(f'O salário bruto ficou: R${salario_bruto}')
print(f'O salário liquido ficou: R${salario_liquido}')