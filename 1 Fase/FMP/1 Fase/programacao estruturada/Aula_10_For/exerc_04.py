'''O usuário deverá informar qual tabuada deseja. E o código deve retornar a tabuada.'''

num = int(input('Informe um número para ver sua tabuada: '))
for n in range(1,11):
    resultado = n * num
    print(f'{num} x {n} = {resultado}')