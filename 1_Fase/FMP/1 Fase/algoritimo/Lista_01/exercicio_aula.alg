algoritmo "Reajuste salarial"
// Função : Calcular o reajuste salarial
// Autor : Cristyan das Neves Silva
// Data : 13/05/2025
// Seção de Declarações 
var
salario, matricula, salarioAumento: real
funcionario, departamento, continuar:caractere
id: inteiro
inicio
// Seção de Comandos 
continuar <- "SIM"
enquanto continuar = "SIM" faca
         escreva("Informe o departamento: (vendas/financeiro/producao/diretoria): ")
         leia(departamento)
         se departamento = "vendas" entao
            escreva("Informe o nome do funcionario: ")
            leia(funcionario)
            escreva("Informe o salario atual do funcionario :R$")
            leia(salario)
            escreva("Informe a matricula do funcionario: ")
            leia(matricula)
            se matricula =  1037825 entao
               salarioAumento <-  salario * 1.068
               Escreval("O Salário de ",funcionario," foi reajustado para:R$",salarioAumento, " reais")
            senao
                 salarioAumento <- salario * 1.038
                 Escreval("O Salário de ",funcionario," foi reajustado para:R$",salarioAumento, " reais")
            fimse
         fimse
         se departamento = "financeiro" entao
            escreva("Informe o nome do funcionario: ")
            leia(funcionario)
            escreva("Informe o salario atual do funcionario :R$")
            leia(salario)
            escreva("Informe a matricula do funcionario: ")
            leia(matricula)
            se matricula =  1224571 entao
               salarioAumento <-  salario * 1.0665
               Escreval("O Salário de ",funcionario," foi reajustado para:R$",salarioAumento, " reais")
            senao
                 salarioAumento <- salario * 1.0365
                 Escreval("O Salário de ",funcionario," foi reajustado para:R$",salarioAumento, " reais")
            fimse
         fimse
         se departamento = "producao" entao
            escreva("Informe o nome do funcionario: ")
            leia(funcionario)
            escreva("Informe o salario atual do funcionario :R$")
            leia(salario)
            escreva("Informe a matricula do funcionario: ")
            leia(matricula)
            se matricula =  1586689 entao
               salarioAumento <-  salario * 1.07
               Escreval("O Salário de ",funcionario," foi reajustado para:R$",salarioAumento, " reais")
            senao
                 salarioAumento <- salario * 1.04
                 Escreval("O Salário de ",funcionario," foi reajustado para:R$",salarioAumento, " reais")
            fimse
         fimse
         se departamento = "diretoria" entao
            escreva("Informe o nome do funcionario: ")
            leia(funcionario)
            escreva("Informe o salario atual do funcionario :R$")
            leia(salario)
            escreva("Informe a matricula do funcionario: ")
            leia(matricula)
            se matricula =  1003575 entao
               salarioAumento <-  salario * 1.055
               Escreval("O Salário de ",funcionario," foi reajustado para:R$",salarioAumento, " reais")
            senao
                 salarioAumento <- salario * 1.025
                 Escreval("O Salário de ",funcionario," foi reajustado para:R$",salarioAumento, " reais")
            fimse
         fimse
         escreva("Deseja verificar o reajuste de mais algum funcionario? SIM/NAO")
         leia(continuar)
fimenquanto
fimalgoritmo
