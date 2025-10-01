'''1. Converta as temperaturas da lista celsius = [0, 15, 40] para fahrenheit e adicione a
lista fahrenheit = [].'''

celsius = [0, 15,40]
fahrenheit = []
calculoFahrenheit = (celsius[0] * 1.8)+32
fahrenheit.append(calculoFahrenheit)
print(f'{celsius[0]} = {calculoFahrenheit}ºF')
calculoFahrenheit = (celsius[1] * 1.8)+32
fahrenheit.append(calculoFahrenheit)
print(f'{celsius[1]} = {calculoFahrenheit}ºF')
calculoFahrenheit = (celsius[2] * 1.8)+32
fahrenheit.append(calculoFahrenheit)
print(f'{celsius[2]} = {calculoFahrenheit}ºF')
print(fahrenheit)