# Faça um algoritmo (encapsulado em uma função)  que leia um salário de um funcionário e o aumente em 15%. Após o aumento, desconte 5% de impostos. Imprima o salário inicial, o salário com o aumento e o salário final.

# Use as seguintes funções:

def calculaAumento(v):
    """ 
    ENTRADA: Um valor numérico 'v' representando um salário.
    SAÍDA: O valor inicial 'v' após passar por um aumento de 15%.
    """
    return v * 1.15  

def calculaDesconto(v):
    """ 
    ENTRADA: Um valor numérico 'v' representando um salário.
    SAÍDA: O valor inicial 'v' após passar por um desconto de 5% de impostos.
    """
    return v * 0.95  

def calculaSalarioFinal(v):
    """ 
    ENTRADA: Um valor numérico 'v' representando um salário.
    SAÍDA: O valor inicial 'v' após passar por todos os descontos e aumentos previstos.
    """
    salarioComAumento = calculaAumento(v)  
    salarioFinal = calculaDesconto(salarioComAumento)   
    return salarioFinal

salarioInicial = float(input("Digite o salário inicial do funcionário: "))
salarioComAumento = calculaAumento(salarioInicial)
salarioFinal = calculaSalarioFinal(salarioInicial)

print(f"Salário inicial: R$ {salarioInicial:.2f}")
print(f"Salário com aumento: R$ {salarioComAumento:.2f}")
print(f"Salário final (após desconto): R$ {salarioFinal:.2f}")