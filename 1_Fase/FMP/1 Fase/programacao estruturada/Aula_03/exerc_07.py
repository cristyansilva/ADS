'''A fábrica de refrigerantes Meia-Cola vende seu produto em três formatos: 
lata de 350 ml, 
garrafa de 600 ml 
e garrafa de 2 litros. 
Se um comerciante compra uma determinada quantidade de cada formato, 
faça um algoritmo para calcular quantos litros de refrigerante ele comprou.'''
print('Olá')
lata = int(input('Quantas latas de Meia-Cola o senhor vai querer comprar hoje: '))
g600 = int(input('Quantas garrafas de 600ml de Meia-Cola o senhor vai querer comprar hoje: '))
g2 = int(input('Quantas garrafas de 2ml de Meia-Cola o senhor vai querer comprar hoje: '))
litros_lata = lata * 0.350
litros_g600 = g600 * 0.6
litros_g2 = g2 * 2
litros_total = float(litros_lata + litros_g600 + litros_g2)
print(f'Fechamos o pedido com {litros_total}L de Meia-Cola.')