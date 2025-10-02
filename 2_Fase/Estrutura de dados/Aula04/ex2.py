# Escreva código que atenda  à seguinte especificação:

# def eh_palindromo(s):
#     """ Entrada: Uma string s
#          Saída: Retorna True se 's' é um palíndromo, e False caso contrário.
#    """

# Por exemplo:

# * Para s = "222" deve retornar True
# * Para s = "2222" deve retornar True
# * Para s = "abc" deve retornar False

def palindromo(s):
    return s == s[::-1]  

print(palindromo("222"))   
print(palindromo("2222"))  
print(palindromo("abc"))   