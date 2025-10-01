import time
'''cR = 10
for n in range(1, 11):
    print(cR)
    cR -= 1
    time.sleep(1)
print("Feliz Ano Novo!")

for n in range(10, 0, -1):
    print(n)
    time.sleep(1)
print("Feliz Ano Novo!")'''
# --------- *TOTAL* ---------
#1
n = 0
soma = 0
cont = 0
somaPar = 0
somaImpar = 0
for l in range(1,501):
    n += + l
print(f'Total: {n}')
#2
for l in range(1, 501):
    if l % 2 == 0:
      somaPar = somaPar + l
    else:
        somaImpar = somaImpar +1
#3
for c in range(1,3):
    num=int(input(f"informe o {c} numero: "))
    if num % 3 ==0:
        soma = soma + num
        cont = cont + 1
print(f'soma total: {n}')
print(f'soma dos pares: {somaPar}')
print(f'soma dos impares: {somaImpar}')
print(f'A soma de todos os {cont} valores solicitados é {soma}.')