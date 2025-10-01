'''5. Criar um algoritmo que leia os limites inferior e superior de um intervalo e
imprima todos os números pares no intervalo aberto e seu somatório.
Suponha que os números digitados são um intervalo crescente.
Exemplo:
- Limite inferior: 3
- Limite superior: 12
- Saída: 4 6 8 10
- Soma: 28'''
limiteInf= int(input("Informe o limite Inferior: "))
limiteSup= int(input("Informe o limite Superior: "))
soma=0

print("Números pares no intervalo aberto:")
for i in range(limiteInf +1, limiteSup):
    if i % 2 == 0:
        soma += i
        print(i, end=",")       
print(f"\n{soma}")
