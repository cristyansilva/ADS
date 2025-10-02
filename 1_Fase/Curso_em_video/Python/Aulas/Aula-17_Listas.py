'''Nessa aula, vamos aprender o que são LISTAS e como utilizar listas em Python. As listas são variáveis compostas que permitem armazenar vários valores em uma mesma estrutura, acessíveis por chaves individuais.'''
'''
num = [2, 5, 9, 1]
num[2] = 3  #altera a posição 2 para o numero 3
num.append(7)   #adiciona o 7 no final da lista
num.sort()  #organiza do menor pro maior
num.sort(reverse=True)   #organiza do maior pro menor
num.insert(2, 0)  #insere na posição 2 o valor 0
num.pop()   #elimina o ultimo valor
num.pop(2)  #elimina o valor da posição 2
num.remove(2)  #remove o primeiro 2 que ele achar

print(f'Essa lista tem {len(num)} elementos')

valores = []
valores.append(5)
valores.append(9)
valores.append(4)
for c, v in enumerate(valores):
    print(f'Na posição {c} encontrei o valor {v}!')
print('Cheguei ao final da lista.')'''
a = [2, 3, 4, 7]
b = a[:]  #[:] cria uma copia da lista a
b[2] = 8  # muda a o valor na posição 2 na lista B para o valor 8
print(f'Lista A: {a}')
print(f'Lista B: {b}')