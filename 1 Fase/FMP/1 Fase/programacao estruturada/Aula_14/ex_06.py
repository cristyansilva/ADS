'''6. Faça um algoritmo que leia tantos números quanto o usuário desejar e
imprima a soma deles.'''

numInicial = int(input("Informe o numero que você deseja iniciar: "))
numFinal = int(input("Informe o numero que você deseja parar: "))
soma=0
for i in range(numInicial, numFinal+1):
    soma +=i
print(f"A soma desses números é: {soma}")