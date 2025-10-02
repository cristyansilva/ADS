def eh_triangular(n):
    """
    Entrada: um inteiro positivo 'n'.
    Saída: True, se 'n' é um número triangular. Isto é, ele é a soma de números naturais
                sequenciais começando em 1. Exemplo: 1+2+3+...+k
    """
    total = 0
    for i in range(1, n + 1):  #ajustando modo de usar o range
        total += i
        if total == n:
            return True  #print por return
        if total > n: #limitando o range 
            return False  #print por return
    return False  

print(eh_triangular(4))  # Deve imprimir 'False'
print(eh_triangular(6))  # Deve imprimir 'True'
print(eh_triangular(1))  # Deve imprimir 'True'