salario = float(input("Informe seu salário: "))
porcent = float(input("Informe quantos % você quer economizar: "))
precoCasa = float(input("Informe qual o preço da casa que deseja comprar: "))

entrada = precoCasa * 0.25

economizado = 0
meses = 0
economiaMensal = salario * (porcent / 100)

while economizado < entrada:
    economizado += economiaMensal
    economizado *= 1.005  
    meses += 1 
print(f"Você precisará de {meses} meses para economizar o suficiente para a entrada da casa.")