# Escreva código que atende à seguinte especificação:

# def mantem_consoantes(palavra): 
#     """ Entrada: 'palavra' é uma string formada por letras minúsculas
#          Saída: Retorna uma string contendo apenas as consoantes de 'palavra' na mesma odem em que aparecem
#  """ 
# # Troque este comentário pelo seu código


# # Por exemplo: 
# # print(mantem_consoantes("abcd")) # imprime bcd 
# # print(mantem_consoantes("aaa")) # imprime uma string vazia 
# # print(mantem_consoantes("babas")) # imprime  bbs


def mantem_consoantes(palavra): 
    """ 
    Entrada: 'palavra' é uma string formada por letras minúsculas.
    Saída: Retorna uma string contendo apenas as consoantes de 'palavra' na mesma ordem em que aparecem.
    """
    vogais = "aeiou" 
    return "".join([letra for letra in palavra if letra not in vogais])  # print('-'.join(frase))  #poe um - no meio de cada letra

print(mantem_consoantes("palavra")) 
