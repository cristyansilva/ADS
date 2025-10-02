def aplica(criterio, n):
    """
    ENTRADA: 'criterio' é uma função que recebe um número e retorna 'True' ou 'False'
             'n' é um inteiro
    SAÍDA: Retorna quantos inteiros de 0 até 'n' (inclusive) se encaixam no critério.
           (um número se encaixa no critério se a função de critério retorna True para ele)
    """
    contador = 0
    for i in range(n + 1):  
        if criterio(i):
            contador += 1
    return contador

def ehPar(x):
    return x % 2 == 0

def maiorQue5(x):
    return x > 5

print(aplica(ehPar, 10)) 
print(aplica(maiorQue5, 10)) 