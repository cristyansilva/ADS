'''A escola “APRENDER” faz o pagamento de seus professores por hora/aula. Faça um
algoritmo que calcule e exiba o salário de um professor. 
Sabe-se que o valor da hora/aula segue a tabela abaixo: 
Professor Nível 1 R$12,00 por hora/aula 
Professor Nível 2 R$17,00 por hora/aula 
Professor Nível 3 R$25,00 por hora/aula.'''
nomeProfessor = str(input('Informe o nome do professor: '))
horasTrabalhadas = int(input('Informe a quantidade de horas trabalhadas: '))
nivelProfessor = int(input('Informe o nível do professor'))
if nivelProfessor == 1:
    print(f'O salário do professor será: R${horasTrabalhadas * 12}')
elif nivelProfessor == 2:
    print(f'O salário do professor será: R${horasTrabalhadas * 17}')
elif nivelProfessor == 3:
    print(f'O salário do professor será: R${horasTrabalhadas * 25}')
print('-' * 20)
print('Fim')