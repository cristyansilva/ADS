'''4. Foi feita uma pesquisa entre os habitantes de uma região e coletados os
dados de altura e sexo (0=masc, 1=fem) das pessoas. Faça um programa
que leia 50 dados diferentes e informe:
a. a maior e a menor altura encontradas;
b. a média de altura das mulheres;
c. a média de altura da população;
d. o percentual de homens na população.'''

maiorAltura = 0
menorAltura = float('inf')
somaAlturaMulheres = 0
somaAlturaTotal = 0
qtdMulheres = 0
qtdHomens = 0
totalHabitantes = 50

for i in range(totalHabitantes):
    print(f"Pessoa {i + 1}:")
    altura = float(input("Informe a altura (em metros): "))
    sexo = int(input("Informe o sexo (0 = masc, 1 = fem): "))
    
    if altura > maiorAltura:
        maiorAltura = altura
    if altura < menorAltura:
        menorAltura = altura
    
    somaAlturaTotal += altura
    if sexo == 1:  
        somaAlturaMulheres += altura
        qtdMulheres += 1
    elif sexo == 0: 
        qtdHomens += 1

mediaAlturaMulheres = somaAlturaMulheres / qtdMulheres if qtdMulheres > 0 else 0
mediaAlturaPopulacao = somaAlturaTotal / totalHabitantes
percentualHomens = (qtdHomens / totalHabitantes) * 100

print(f"\nResultados da pesquisa:")
print(f"a. Maior altura encontrada: {maiorAltura:.2f} m")
print(f"a. Menor altura encontrada: {menorAltura:.2f} m")
print(f"b. Média de altura das mulheres: {mediaAlturaMulheres:.2f} m")
print(f"c. Média de altura da população: {mediaAlturaPopulacao:.2f} m")
print(f"d. Percentual de homens na população: {percentualHomens:.2f}%")