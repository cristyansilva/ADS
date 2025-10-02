'''O usuário deverá informar:
● qual tabuada deseja
● em qual valor inicia
● em qual valor termina
E o código deve retornar a tabuada, conforme a faixa informada.
Informe a tabuada desejada: 5
➔ Início: 3
➔ Fim: 7
3 x 5 = 15
4 x 5 = 20
...
7 x 5 = 35'''
tabuada=int(input('Informe a tabuada desejada: '))
numInicio=int(input('Informe em qual numero deseja iniciar: '))
numFim=int(input('Informe o numero que deseja parar: '))

for n in range(numInicio, numFim+1):
    resultado= tabuada * n
    print(f'{tabuada} x {n} = {resultado}')