n = 0
soma = 0
cont = 0
somaPar = 0
somaImpar = 0
for c in range(1,3):
    num=int(input(f"informe o {c} numero: "))
    if num % 3 ==0:
        soma = soma + num
        cont = cont + 1
print(f'soma total: {n}')
print(f'soma dos pares: {somaPar}')
print(f'soma dos impares: {somaImpar}')
print(f'A soma de todos os {cont} valores solicitados é {soma}.')