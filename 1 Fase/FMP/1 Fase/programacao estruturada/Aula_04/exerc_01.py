'''
Pedrinho tem um cofrinho com muitas moedas, e deseja saber quantos reais
conseguiu poupar. Faça um algoritmo para ler a quantidade de cada tipo de
moeda, e imprimir o valor total economizado, em reais. Considere que
existam moedas de 1, 5, 10, 25 e 50 centavos, e ainda moedas de 1 real.
Não havendo moeda de um tipo, a quantidade respectiva é zero.
'''

m1 = int(input('Quantas moedas de 0.01 você tem? '))
m2 = int(input('Quantas moedas de 0.05 você tem? '))
m3 = int(input('Quantas moedas de 0.10 você tem? '))
m4 = int(input('Quantas moedas de 0.25 você tem? '))
m5 = int(input('Quantas moedas de 0.50 você tem? '))
m6 = int(input('Quantas moedas de 1 real você tem?'))
umCent = m1 * 0.01
cincoCent = m2 * 0.05
dezCent = m3 * 0.1
vinteCincoCent = m4 * 0.25
cinqCent = m5 * 0.5
umReal = m6 * 1
total = umCent + cincoCent + dezCent + vinteCincoCent + cinqCent + umCent
if total == 0:
    print('Você não tem dinheiro!')
else:
    print(f'Você tem {total:.2f} Reais.')