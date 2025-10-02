'''Um funcionário recebe um salário fixo mais 4% de comissão sobre as
vendas. Faça um algoritmo que receba o salário fixo de um funcionário e o
valor de suas vendas, calcule e mostre a comissão e o salário final do
funcionário.'''
salarioFixo = float(input('Qual o salário do funcionario? R$'))
vendas = float(input('Quanto o funcionario vendeu? R$'))
comissao = vendas * 0.04
salarioFinal = salarioFixo + comissao
print(f'A comissão do funcionário foi :R${comissao:.2f}')
print(f'juntando com seu salario fixo R${salarioFixo} seu salário final vai ser R${salarioFinal}')