def somaTamanhos(L):
	if not L:
		return 0
	return len(L[0]) + somaTamanhos(L[1:])

exemplos = ["olá", "mundo", "", "Python"]
print("Entrada:", exemplos)
print("Soma dos tamanhos:", somaTamanhos(exemplos))
