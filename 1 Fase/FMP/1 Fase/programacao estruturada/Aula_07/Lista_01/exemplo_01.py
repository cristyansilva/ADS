print('Sistema de Média')
aluno = input('Digite o Nome do aluno: ')
n1 = float(input('Digite a Primeira nota: '))
n2 = float(input('Digite a Segunda nota: '))
n3 = float(input('Digite a Terceira nota: '))
m = ((n1*2) + (n2*2) + (n3*1))/5
print(f'Sua média foi: {m}.')
if m >= 6 and m <= 10:
    print(f'{aluno} Parabéns, você foi Aprovado!')
elif m >= 4 and m < 6:
    print(f'{aluno} Em recuperação.')
elif m >= 0 and m < 4:
    print(f'{aluno} Reprovado! Estude mais no próximo semestre!')
else:
    print('Valor invalido!')
