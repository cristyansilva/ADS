somaPar = 0
somaImpar = 0
multiplo=0
numInicio=int(input('Informe o numero que deseja iniciar: '))
numFim=int(input('Informe o numero que deseja parar: '))
multiplo=int(input('Informe o numero que deseja saber os multiplos: '))
for l in range(numInicio, numFim+1):
    if l % 2 == 0:
      somaPar = somaPar + l
    else:
       somaImpar = somaImpar +1
    if l % multiplo == 0:
       multiplo +=1
       
print(f'{l} é multiplo de {multiplo}')
print(f'soma dos pares: {somaPar}')
print(f'soma dos impares: {somaImpar}')
