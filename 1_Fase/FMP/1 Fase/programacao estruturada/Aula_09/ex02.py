'''Faça um algoritmo para ler: a descrição do produto (nome), a quantidade adquirida e o
preço unitário. Calcular e escrever o total 
(total = quantidade adquirida * preço unitário) e o
total a pagar (total a pagar = total - desconto), 
sabendo-se que:
- Se quantidade <= 5 o desconto será de 2%
- Se quantidade > 5 e quantidade <=10 o desconto será de 3%
- Se quantidade > 10 o desconto será de 5%'''
produto = str(input('Digite o nome do produto: '))
qtd = int(input('Qual foi a quantidade adquirida: '))
precoUnitario = float(input('Qual o valor unitário: '))
total = qtd * precoUnitario
if qtd <= 5:
    print(f'O desconto será de 2% e o valor total ficará: R${total * 0.98:.2f}')
if qtd > 5 and qtd <= 10:
    print(f'O desconto será de 3% e o valor total ficará: R${total * 0.97:.2f}')
if qtd > 10:
    print(f'O desconto será de 5% e o valor total ficará: R${total * 0.95:.2f}')
