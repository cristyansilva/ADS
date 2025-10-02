'''Exercício Python 36: Escreva um programa para aprovar o empréstimo bancário para a compra de uma casa. 
Pergunte o valor da casa, 
o salário do comprador 
e em quantos anos ele vai pagar. 
A prestação mensal não pode exceder 30% do salário 
ou então o empréstimo será negado.
'''
valor = float(input('Qual o Valor da casa? R$'))
salario = float(input('Qual o salário do comprador? R$'))
prestacao = int(input('Em quantas vezes vai ser parcelado? '))
limite = salario * 30/100
parcela = valor / (prestacao * 12)
print(f'A parcela ficará: R${parcela:.2f}')
if parcela >= limite:
    print(
        '\033[31mEmprestimo negado, valor da prestação maior do que 30% do salario!\033[m')
else:
    print('\033[32mFinanciamento aprovado!\033[m')
