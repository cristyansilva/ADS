c = float(input("Informe o valor de 'c' no polinômio x³ - c: "))
g = float(input("Informe um chute inicial 'g': "))

novoG = g - ((g**3 - c) / (3 * g**2))

print(f"O novo chute mais próximo do zero do polinômio é: {novoG}")