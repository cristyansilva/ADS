# Queremos descobrir um valor para 'x' tal que x³- c é igual a zero para um valor constante 'c'.

# Embora ainda não saibamos fazer isso, nós podemos chutar um valor 'g', e se g³-c for diferente de zero, podemos chegar em um novo valor 'novo_g' que é mais póximo de um zero no polinômio escolhendo novo_g = g - (g³-c)/(3g²)

# Escreva um programa em python que pede qual é o valor de 'c' usado no polinômio, pede um chute inicial 'g' e com base nisso produza um novo chute 'novo_g' que é mais próximo do zero do polinômio x³- c.

c = float(input("Informe o valor de 'c' no polinômio x³ - c: "))
g = float(input("Informe um chute inicial 'g': "))

novo_g = g - ((g**3 - c) / (3 * g**2))

print(f"O novo chute mais próximo do zero do polinômio é: {novo_g}")