'''Imagina que você consegue atender entre 20 e 30 cães durante a semana no seu Pet Shop.
Se atender menos do que 20 cães, o pet shop ficou ocioso
se você atendeu mais do que 30 significa que o cliente foi até o local mas não pode ser atendido. 
Faça um algoritmo para verificar quantos cães foram atendidos e informar se a petshop ficou ocioso, se está normal
ou se está com carga alta de demanda.'''
qtdAtendimentos = int(input('Quantos cães foram atendidos: '))
if qtdAtendimentos < 20:
    print(f'Foram atendidos {qtdAtendimentos}. O Pet Shop ficou ocioso!')
elif qtdAtendimentos > 30:
    print(f'Foram atendidos {qtdAtendimentos}. Ficaram sobrecarregados com a alta demanda.')
elif qtdAtendimentos >=20 and qtdAtendimentos <=30:
    print(f'Foram atendidos {qtdAtendimentos}. O atendimento está normal')