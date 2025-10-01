# Trabalho 1
# Nome do Estudante: Cristyan das Neves Silva

import random
import string

ARQUIVO_LISTA_PALAVRAS = "palavras.txt"


def carregarPalavras():
    """
    SAÍDA: lista, uma lista de palavras válidas.  As palavras
    são strings em letra minúscula.

    Dependendo do tamanho da lista de palavras, esta função pode
    demorar um pouco para terminar.
    """
    print("Carregando lista de palavras de arquivo...")
    noArquivo = open(ARQUIVO_LISTA_PALAVRAS, 'r')
    linha = noArquivo.readline()
    listaDePalavras = linha.split()
    print(" ", len(listaDePalavras), "palavras carregadas.")
    return listaDePalavras

def escolhePalavra(listaDePalavras):
    """
    ENTRADA: 'listaDePalavras': uma lista de palavras (strings)
    SAÍDA: Uma palavra escolhida da lista
    """
    return random.choice(listaDePalavras)

listaDePalavras = carregarPalavras()

def jogadorVenceu(palavraSecreta, letrasEscolhidas):
    """
    ENTRADA: 'palavraSecreta', uma string em letras minúsculas que o usuário
             deve adivinhar
             'letrasEscolhidas': lista de letras minúsculas que o jogador
             escolheu até agora para adivinhar a palavra
    SAÍDA: True, se todas as letras de 'palavraSecreta' estão em
           'letrasEscolhidas' e False caso contrário
    """
    for letra in palavraSecreta:
        if letra not in letrasEscolhidas:
            return False
    return True

def progressoAtualDaPalavra(palavraSecreta, letrasEscolhidas):
    """
    ENTRADA: 'palavraSecreta', string em letra minúscula que usuário está
             adivinhando.
             'letrasEscolhidas', uma lista de letras minúsculas que o jogador
             escolheu até agora
    SAÍDA: Uma string formada por letras e asteriscos (*) que representam letras
           na palavra secreta que ainda não foram adivinhadas
    """
    progresso = ''
    for letra in palavraSecreta:
        if letra in letrasEscolhidas:
            progresso += letra
        else:
            progresso += '*'
    return progresso

def letrasAindaDisponiveis(letrasEscolhidas):
    """
    ENTRADA: 'letrasEscolhidas', lista de letras minúsculas que o usuário
             escolheu até agora.
    SAÍDA: Uma string formada por todas as letras que ainda não foram escolhidas.
           As letras devem ser retornadas em ordem alfabética.
    """
    alfabeto = string.ascii_lowercase
    disponiveis = ''
    for letra in alfabeto:
        if letra not in letrasEscolhidas:
            disponiveis += letra
    return disponiveis

def forca(palavraSecreta, comAjuda):

    tamanhoPalavra = len(palavraSecreta)
    tentativasRestantes = 10
    letrasEscolhidas = []
    vogais = "aeiou"

    print("\n===================================")
    print("   🤠 Bem-vindo ao Jogo da Forca! 🤠")
    print("===================================")
    print(f"Estou pensando em uma palavra com {tamanhoPalavra} letras.")

    while tentativasRestantes > 0 and not jogadorVenceu(palavraSecreta, letrasEscolhidas):
        print("\n--------------------")

        coracoesCheios = '❤️' * tentativasRestantes
        coracoesVazios = '🖤' * (10 - tentativasRestantes)
        print(
            f"Tentativas: {coracoesCheios}{coracoesVazios} ({tentativasRestantes}/10)")

        progresso = progressoAtualDaPalavra(
            palavraSecreta, letrasEscolhidas)
        print(f"Palavra:  {' '.join(progresso)}")

        print(
            f"Letras disponíveis: {letrasAindaDisponiveis(letrasEscolhidas)}")

        entrada = input("Escolha uma letra (ou '!' para ajuda): ").lower()

        if comAjuda and entrada == '!':
            if tentativasRestantes >= 3:
                tentativasRestantes -= 3
                letraRevelada = ''
                for letra in palavraSecreta:
                    if letra not in letrasEscolhidas:
                        letraRevelada = letra
                        break
                letrasEscolhidas.append(letraRevelada)
                print(
                    f"\n💡 A letra revelada foi '{letraRevelada}'. Custou 3 tentativas.")
            else:
                print("\n⚠️ Você não tem tentativas suficientes (3) para pedir ajuda.")
            continue

        if not entrada.isalpha() or len(entrada) != 1:
            print("\n⚠️ Entrada inválida. Por favor, digite uma única letra.")
            continue

        if entrada in letrasEscolhidas:
            print(f"\n🤔 Você já tentou a letra '{entrada}'. Tente outra!")
            continue

        letrasEscolhidas.append(entrada)

        if entrada in palavraSecreta:
            print(f"\n✅ Boa! A letra '{entrada}' está na palavra!")
        else:
            print(f"\n❌ Oops! A letra '{entrada}' não está na palavra.")
            if entrada in vogais:
                tentativasRestantes -= 2
            else:
                tentativasRestantes -= 1

    print("\n===================================")
    if jogadorVenceu(palavraSecreta, letrasEscolhidas):
        print(f"🏆🎉 PARABÉNS! Você adivinhou a palavra: '{palavraSecreta}'")
        letrasDistintas = len(set(palavraSecreta))
        pontuacao = (tentativasRestantes + 4 * letrasDistintas + 3 * tamanhoPalavra)
        print(f"Sua pontuação final é: {pontuacao}")
    else:
        print(f"💀 GAME OVER! Que pena, você perdeu.")
        print(f"A palavra secreta era: '{palavraSecreta}'")
        print("Sua pontuação é zero. Mais sorte na próxima vez!")
    print("===================================")

if __name__ == "__main__":
    palavraSecreta = escolhePalavra(listaDePalavras)
    comAjuda = True  # mude para False para desativar a ajuda
    forca(palavraSecreta, comAjuda)
