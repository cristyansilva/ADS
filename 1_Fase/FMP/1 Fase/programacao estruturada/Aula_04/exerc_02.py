'''
Um tonel de refresco é feito com 8 partes de água mineral e 2 partes de suco
de maracujá. Faça um algoritmo para calcular quantos litros de água e de
suco são necessários para se fazer X litros de refresco (informados pelo
usuário).
'''
refresco = float(input('Quantos litros de suco você vai querer fazer? '))
agua = (refresco) * 0.8
sucoMaracuja = (refresco) * 0.2
print(f'Você precisará de {agua}L de água e {sucoMaracuja}L de suco de maracujá! para fazer {refresco}L de Suco')