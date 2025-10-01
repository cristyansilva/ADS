'''Faça um programa para o cálculo de uma folha de pagamento, sabendo que os descontos são do Imposto de Renda, que
depende do salário bruto (conforme tabela abaixo) e 3% para o Sindicato e que o FGTS corresponde a 11% do Salário
Bruto, mas não é descontado (é a empresa que deposita). O Salário Líquido corresponde ao Salário Bruto menos os
descontos. O programa deverá pedir ao usuário o valor da sua hora e a quantidade de horas trabalhadas no mês.
Desconto do IR:
Salário Bruto até 900 (inclusive) - isento
Salário Bruto até 1500 (inclusive) - desconto de 5%
Salário Bruto até 2500 (inclusive) - desconto de 10%
Salário Bruto acima de 2500 - desconto de 20% Imprima na tela as informações, dispostas conforme o exemplo
abaixo. No exemplo o valor da hora é 5 e a quantidade de hora é 220.'''
valorHoras = float(input('Qual o valor da hora trabalhada?: '))
horasTrabalhadas = float(input('Quantas horas você trabalhou esse mes?: '))
salarioBruto = valorHoras * horasTrabalhadas
if salarioBruto <=900:
    impostoRenda = 'Isento'
    sindicato = salarioBruto * 0.03
    fgts = salarioBruto * 0.11
    inss = salarioBruto * 0.1
    totalDescontos = sindicato + inss
    salarioLiquido = salarioBruto - sindicato - inss
    print(f'Salario Bruto: {horasTrabalhadas * valorHoras} : R${salarioBruto}')
    print(f'(-) IR (5%)                                    : {impostoRenda}')
    print(f'(-) INSS (10%)                                 : R${inss:.2f}')
    print(f'FGTS (11%)                                     : R${fgts:.2f}')
    print(f'total de descontos                             : R${totalDescontos:.2f}')
    print(f'Salário Liquido                                : R${salarioLiquido}')
elif salarioBruto >900 and salarioBruto <=1500:
    impostoRenda = salarioBruto * 0.05
    sindicato = salarioBruto * 0.03
    fgts = salarioBruto * 0.11
    inss = salarioBruto * 0.1
    totalDescontos = sindicato + impostoRenda + inss
    salarioLiquido = salarioBruto - sindicato - inss - impostoRenda
    print(f'Salario Bruto: {horasTrabalhadas * valorHoras} : R${salarioBruto}')
    print(f'(-) IR (5%)                                    : R${impostoRenda:.2f}')
    print(f'(-) INSS (10%)                                 : R${inss:.2f}')
    print(f'FGTS (11%)                                     : R${fgts:.2f}')
    print(f'total de descontos                             : R${totalDescontos:.2f}')
    print(f'Salário Liquido                                : R${salarioLiquido}')
elif salarioBruto >1500 and salarioBruto <=2500:
    impostoRenda = salarioBruto * 0.1
    sindicato = salarioBruto * 0.03
    fgts = salarioBruto * 0.11
    inss = salarioBruto * 0.1
    totalDescontos = sindicato + impostoRenda + inss
    salarioLiquido = salarioBruto - sindicato - inss - impostoRenda
    print(f'Salario Bruto: {horasTrabalhadas * valorHoras} : R${salarioBruto}')
    print(f'(-) IR (5%)                                    : R${impostoRenda:.2f}')
    print(f'(-) INSS (10%)                                 : R${inss:.2f}')
    print(f'FGTS (11%)                                     : R${fgts:.2f}')
    print(f'total de descontos                             : R${totalDescontos:.2f}')
    print(f'Salário Liquido                                : R${salarioLiquido}')
elif salarioBruto >2500:
    impostoRenda = salarioBruto * 0.2
    sindicato = salarioBruto * 0.03
    fgts = salarioBruto * 0.11
    inss = salarioBruto * 0.1
    totalDescontos = sindicato + impostoRenda + inss
    salarioLiquido = salarioBruto - sindicato - inss - impostoRenda
    print(f'Salario Bruto: {horasTrabalhadas * valorHoras} : R${salarioBruto}')
    print(f'(-) IR (5%)                                    : R${impostoRenda:.2f}')
    print(f'(-) INSS (10%)                                 : R${inss:.2f}')
    print(f'FGTS (11%)                                     : R${fgts:.2f}')
    print(f'total de descontos                             : R${totalDescontos:.2f}')
    print(f'Salário Liquido                                : R${salarioLiquido}')