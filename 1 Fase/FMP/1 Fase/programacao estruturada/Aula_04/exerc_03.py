'''Faça um algoritmo que receba o preço de um produto, calcule e mostre o
novo preço, sabendo-se que este sofreu um desconto de 10%.'''

preco = float(input('Digite o preço do produto: R$'))
precoDesconto = preco * 0.9
print(f'O Valor do produto com desconto é R${precoDesconto:.2f}')