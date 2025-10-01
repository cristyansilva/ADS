'''Uma rainha requisitou os serviços de um monge, o qual exigiu o pagamento em grãos de trigo da seguinte maneira: 
os grãos de trigo seriam dispostos em um tabuleiro de xadrez,
de tal forma que a primeira casa do tabuleiro tivesse um grão, 
e as casas seguintes o dobro da anterior. 
Construa um algoritmo que calcule quantos grãos de trigo a Rainha deverá pagar ao monge. Um tabuleiro tem 64 casas.
'''
totalGraos=1
for i in range(1,64):
    posicao=2**i
    totalGraos+=posicao
print(f'{totalGraos}')