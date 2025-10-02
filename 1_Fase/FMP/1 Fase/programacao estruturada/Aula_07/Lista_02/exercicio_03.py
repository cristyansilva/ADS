'''3. Crie um algoritmo que leia quatro valores digitados pelo usuário: n, a, b, c.
a) Se n = 1 imprimir os três valores a, b, c em ordem crescente.
b) Se n = 2 escrever os três valores a, b, c em ordem decrescente.
c) Se n = 3 escrever os três valores a, b, c de forma que o maior fique no meio'''
# Leitura dos valores
print('-'*30)
print('''
    [1] Para ver em ordem Crescente
    [2] Para ver em ordem Decrescente
    [3] Para ver o numero maior no meio
      ''')
print('-'*30)

n = int(input("Escolha uma Opção (1, 2 ou 3): "))
a = int(input("Digite um valor: "))
b = int(input("Digite um valor: "))
c = int(input("Digite um valor: "))

nInformados = [a, b, c]

if n == 1:
    nInformados.sort()
    print("Ordem crescente:", nInformados)

elif n == 2:
    nInformados.sort(reverse=True)
    print("Ordem decrescente:", nInformados)

elif n == 3:
    maior = max(nInformados)
    nInformados.remove(maior)
    resultado = [nInformados[0], maior, nInformados[1]]
    print("Maior valor no meio:", resultado)

else:
    print("Valor de n inválido. Digite 1, 2 ou 3.")
