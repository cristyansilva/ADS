'''8. Faça um programa que leia um valor n, inteiro e positivo, calcule e mostre a
seguinte soma:
S = 1/1 + 1/2 + 1/3 + 1/4 + ... + 1/n.

n = 4
S = 1/1 + 1/2 + 1/3 + 1⁄4
S = 1 + 0.5 + 0.333 + 0.25 = 2.08'''

n = int(input("Informe um valor inteiro e positivo para n: "))

if n <= 0:
    print("O valor de n deve ser um número inteiro e positivo.")
else:
    soma = 0  
    for i in range(1, n + 1):  
        soma += 1 / i  
    print(f"A soma da série S é: {soma:.2f}")