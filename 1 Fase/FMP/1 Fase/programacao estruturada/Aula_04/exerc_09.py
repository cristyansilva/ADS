'''João recebeu seu salário de R$1200,00 e precisa pagar duas contas 
(C1 = R$200,00 e C2 = R$120,00) que estão atrasadas. Como as contas estão
atrasadas, João terá de pagar multa de 2% sobre cada conta. Faça um
algoritmo que calcule e mostre quanto restará do salário do João.'''
salario = 1200
c1 = 200 * 1.02
c2 = 120 * 1.02
print(f'Restará do seu salário: R${salario - c1 - c2}')