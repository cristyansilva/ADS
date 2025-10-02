# Você se formou e conseguiu um emprego. Agora quer comprar uma casa. Para isso, irá economizar uma porcentagem de seu salário todo mês e colocar em uma caderneta de poupança.

# Faça um programa que pergunta para o usuário:

# 1) Qual o seu salário.
# 2) Qual a porcentagem que ele deseja economizar todo mês.
# 3) Qual o preço da casa.

# O programa deve imprimir quantos meses de salário você deve economizar para conseguir a casa, assumindo que você pode comprar ela à partir do momento que conseguir pagar 25% de seu valor como entrada. Assuma que a cada mês, o valor que você tinha economizado até então, rendeu 0,5% a mais desde o mês anterior.

salario = float(input("Informe seu salário: R$"))
porcent = float(input("Informe quantos % você quer economizar: "))
precoCasa = float(input("Informe qual o preço da casa que deseja comprar: R$"))

entrada = precoCasa * 0.25

economizado = 0
meses = 0
economiaMensal = salario * (porcent / 100)

while economizado < entrada:
    economizado *= 1.005  
    economizado += economiaMensal 
    meses += 1 
print(f"Você precisará de {meses} meses para economizar o suficiente para a entrada da casa.")