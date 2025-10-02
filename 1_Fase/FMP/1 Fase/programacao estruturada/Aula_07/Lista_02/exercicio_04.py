'''Escreva um programa que converta um intervalo de tempo dado em minutos,
em horas, minutos e segundos. Por exemplo, se o tempo dado for 145,87
minutos, o programa deve fornecer 2 h 25 min 52,2 s.'''

horasT = float(input('Digite um intervalo de tempo em minutos: '))
minutosInteiros = int(horasT)
segundos_decimais = horasT - minutosInteiros * 60
horas = minutosInteiros // 60
minutos = segundos_decimais % 60

print(f'{horas} h {minutos:.2f} min')