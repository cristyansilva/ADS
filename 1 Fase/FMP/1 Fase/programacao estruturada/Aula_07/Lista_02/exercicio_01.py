'''Escrever um algoritmo que lê o número de identificação, as 3 notas
obtidas por um aluno nas 3 verificações e a média dos exercícios que
fazem parte da avaliação. Calcular a média de aproveitamento, usando
a fórmula:
MA = (Nota1 + Nota2 x 2 + Nota3 x 3 + ME ) / 7
A atribuição de conceitos obedece a tabela abaixo:
Média de Aproveitamento Conceito
9,0 A
7,5 e < 9,0 B
6,0 e < 7,5 C
4,0 e < 6,0 D
< 4,0 E
O algoritmo deve escrever o número do aluno, suas notas, a média dos
exercícios, a média de aproveitamento, o conceito correspondente e a
mensagem: APROVADO se o conceito for A,B ou C e REPROVADO se
o conceito for D ou E.'''
print('-'*30)
nomeAluno = str(input('Qual o número de ID do aluno: '))
nota1 = float(input('Digite a primeira nota: '))
nota2 = float(input('Digite a segunda nota: '))
nota3 = float(input('Digite a terceira nota: '))
me = float(input('Digite a média dos exercícios: '))
print('-'*30)
ma = ((nota1*1) + (nota2*2) + (nota3*3) + (me*1)) / 7
if ma >=9:
    print(f'"Conceito A", a média do aluno {nomeAluno} foi {ma:.2f}, Aluno APROVADO!')
elif ma >= 7.5 and ma < 9:
    print(f'"Conceito B", a média do aluno {nomeAluno} foi {ma:.2f}, Aluno APROVADO!')
elif ma >= 6 and ma < 7.5:
    print(f'"Conceito C", a média do aluno {nomeAluno} foi {ma:.2f}, Aluno  APROVADO!')
elif ma >= 4 and ma < 6:
    print(f'"Conceito D", a média do aluno {nomeAluno} foi {ma:.2f}, Aluno REPROVADO!')
elif ma < 4:
    print(f'"Conceito e", a média do aluno {nomeAluno} foi {ma:.2f}, Aluno REPROVADO!')
elif ma >10 or ma <0:
    print('Verifique as notas informadas!')