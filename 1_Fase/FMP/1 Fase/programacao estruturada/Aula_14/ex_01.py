'''1. A prefeitura de uma cidade fez uma pesquisa entre seus habitantes,
coletando dados sobre o salário e número de filhos. A prefeitura deseja
saber:
a. média do salário da população;
b. média do número de filhos;
c. maior salário;
d. percentual de pessoas com salário até R$100,00.
O final da leitura de dados se dará com a entrada de um salário negativo.'''

'''1. A prefeitura de uma cidade fez uma pesquisa entre seus habitantes,
coletando dados sobre o salário e número de filhos. A prefeitura deseja
saber:
a. média do salário da população;
b. média do número de filhos;
c. maior salário;
d. percentual de pessoas com salário até R$100,00.
O final da leitura de dados se dará com a entrada de um salário negativo.'''

totalSalario = 0
totalFilhos = 0
maiorSalario = 0
salariosAte100 = 0
habitantes = 0

while True:
    salario = float(input("Informe o salário (valor negativo para encerrar): "))
    if salario < 0:
        break      
    filhos = int(input("Informe o número de filhos: "))
    totalSalario += salario
    totalFilhos += filhos
    habitantes += 1
    
    if salario > maiorSalario:
        maiorSalario = salario
    
    if salario <= 100:
        salariosAte100 += 1
if habitantes > 0:
    mediaSalario = totalSalario / habitantes
    media_filhos = totalFilhos / habitantes
    percentualSalariosAte_100 = (salariosAte100 / habitantes) * 100
else:
    mediaSalario = 0
    mediaFilhos = 0
    percentualSalariosAte100 = 0
print(f"Média do salário da população: R${mediaSalario:.2f}")
print(f"Média do número de filhos: {mediaFilhos:.2f}")
print(f"Maior salário: R${maiorSalario:.2f}")
print(f"Percentual de pessoas com salário até R$100,00: {percentualSalariosAte100:.2f}%")