'''Faça um algoritmo que receba o valor do salário mínimo e o valor do salário
de um funcionário, calcule e mostre a quantidade de salários mínimos que
ganha esse funcionário.'''
salarioMin = float(input('Qual o salário minimo atualmente? R$'))
SalarioFuncionario = float(input('Qual o salário do funcionário? R$'))
quantidade = SalarioFuncionario / salarioMin
print(f'O funcionário recebe {quantidade:.2f} Salários minimos.')