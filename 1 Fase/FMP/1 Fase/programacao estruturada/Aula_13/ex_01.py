'''Escrever um algoritmo que leia um número n que indica quantos valores
devem ser lidos a seguir. Para cada número lido, mostre uma tabela
contendo o valor lido e o fatorial deste valor.'''
'''
n = int(input("Quantos valores você deseja calcular o fatorial? "))
contador = 0 
while contador < n:
    fatorar = int(input("Informe um número para ver seu fatorial: "))
    fatorial = 1
    print(f'{fatorar}! = ', end='')
    i = fatorar 
    while i > 0:
        fatorial *= i
        if i == fatorar:
            print(i, end='')
        else:
            print(f' X {i}', end='')
        i -= 1
    print(f' = {fatorial}')
    contador += 1'''

Mlista = []
for _ in range(4):  
    Mlista.append(input('Informe um nome: '))

print("Lista de nomes:", Mlista)