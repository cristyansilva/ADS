import math

def conta_numeros_com_raiz_perto_de(n, epsilon):
    """
    ENTRADA: 'n' é um inteiro maior que 2
             'epsilon' é um número positivo menor que 1
    SAÍDA: Retorna quantos números inteiros têm uma raiz quadrada próxima de 'n'.
           Uma raiz quadrada próxima é aquela que tem uma distância menor que 'epsilon' do valor 'n'.
    """
    contador = 0
    valor_min = (n - epsilon) ** 2  
    valor_max = (n + epsilon) ** 2  

    for i in range(math.ceil(valor_min), math.floor(valor_max) + 1):
        raiz = math.sqrt(i)
        if abs(raiz - n) < epsilon:
            contador += 1

    return contador

print(conta_numeros_com_raiz_perto_de(10, 0.1)) 