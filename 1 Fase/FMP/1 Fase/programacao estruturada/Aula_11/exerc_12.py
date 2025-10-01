'''5. Em uma eleição presidencial existem quatro candidatos. 
Os votos são informados através de códigos. Os dados utilizados para a contagem dos
votos obedecem à seguinte codificação:
a. 1,2,3,4 = voto para os respectivos candidatos;
b. 5 = voto nulo;
c. 6 = voto em branco;
d. Elabore um algoritmo que leia o código do candidato em um voto.
Calcule e escreva:
e. total de votos para cada candidato;
f. total de votos nulos;
g. total de votos em branco;
Faça um algoritmo para ler pelo menos 100 votos.'''
candidato1 = 0
candidato2 = 0
candidato3 = 0
candidato4 = 0
votoNulo = 0
votoBranco = 0
cont = 0
while cont <= 3:
    voto = int(input(f'Informe seu voto: '))
    if voto == 1:
        candidato1 += 1
    elif voto == 2:
        candidato2 += 1
    elif voto == 3:
        candidato3 += 1
    elif voto == 4:
        candidato4 += 1
    elif voto == 5:
        votoNulo += 1
    elif voto == 6:
        votoBranco += 1
    else:
        print('Código inválido! Tente novamente.')
        continue
    cont += cont
print(f'Total de votos para o candidato 1: {candidato1}')
print(f'Total de votos para o candidato 2: {candidato2}')
print(f'Total de votos para o candidato 3: {candidato3}')
print(f'Total de votos para o candidato 4: {candidato4}')
print(f'Total de votos nulos: {votoNulo}')
print(f'Total de votos em branco: {votoBranco}')
print(f'Total de votos foram: {cont}')