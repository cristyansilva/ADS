def contaCaracteres(s):
    """
    ENTRADA: Uma string 's' com caracteres em letra minúscula
    SAÍDA: Uma tupla onde o primeiro elemento é o número de vogais e o segundo é o número de consoantes.
    """
    vogais = "aeiou"
    consoantes = "bcdfghjklmnpqrstvwxyz"
    
    numVogais = sum(1 for caracter in s if caracter in vogais)
    numConsoantes = sum(1 for caracter in s if caracter in consoantes)
    
    return (numVogais, numConsoantes)

print(contaCaracteres("abcd")) 
print(contaCaracteres("zcght"))  