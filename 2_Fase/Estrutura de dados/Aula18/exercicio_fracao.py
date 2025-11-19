import math

class Fraction:
    def __init__(self, num, den):
        """
        Inicializa a fração. O denominador não pode ser zero.
        A fração é automaticamente simplificada.
        """
        if den == 0:
            raise ValueError("O denominador não pode ser zero")
            
        # Garante que o sinal da fração fique sempre no numerador
        if den < 0:
            num = -num
            den = -den
            
        # Simplifica a fração usando o Máximo Divisor Comum (GCD)
        common_divisor = math.gcd(num, den)
        self.num = num // common_divisor
        self.den = den // common_divisor

    # --- 1. Método de Impressão (str) ---
    
    def __str__(self):
        """
        Retorna a representação em string da fração.
        Se o denominador for 1, imprime como inteiro.
        """
        if self.den == 1:
            return str(self.num)
        else:
            return f"{self.num}/{self.den}"

    def __repr__(self):
        """ Representação oficial (para debug) """
        return f"Fraction({self.num}, {self.den})"

    # --- 2. Método de Adição (add) ---

    def __add__(self, other):
        """
        Permite a operação: self + other
        Ex: f1 + f2   ou   f1 + 5
        """
        
        # Se 'other' for um inteiro, converte para fração (ex: 5 -> 5/1)
        if isinstance(other, int):
            other = Fraction(other, 1)
            
        if isinstance(other, Fraction):
            # Fórmula da soma: (a/b) + (c/d) = (ad + cb) / (bd)
            novo_num = (self.num * other.den) + (other.num * self.den)
            novo_den = self.den * other.den
            
            # Retorna uma NOVA fração (que será simplificada no __init__)
            return Fraction(novo_num, novo_den)
        
        # Se 'other' não for int ou Fraction, não sabemos somar
        return NotImplemented

    # --- 3. Método de Multiplicação (mul) ---

    def __mul__(self, other):
        """
        Permite a operação: self * other
        Ex: f1 * f2   ou   f1 * 5
        """

        # Se 'other' for um inteiro, converte para fração
        if isinstance(other, int):
            other = Fraction(other, 1)

        if isinstance(other, Fraction):
            # Fórmula da multiplicação: (a/b) * (c/d) = (ac) / (bd)
            novo_num = self.num * other.num
            novo_den = self.den * other.den
            
            # Retorna a nova fração (simplificada)
            return Fraction(novo_num, novo_den)
            
        return NotImplemented

# --- Demonstração de Uso ---

print("--- Inicialização e Simplificação ---")
f1 = Fraction(1, 2)
f2 = Fraction(6, 8) # Deve simplificar para 3/4
print(f"f1 = {f1}")
print(f"f2 (era 6/8) = {f2}")

print("\n--- Teste de Impressão (Inteiro) ---")
f_inteiro = Fraction(10, 5) # Deve simplificar para 2/1
print(f"f_inteiro (era 10/5) = {f_inteiro}")

print("\n--- Teste de Adição (+) ---")
soma = f1 + f2 # 1/2 + 3/4 = 2/4 + 3/4 = 5/4
print(f"{f1} + {f2} = {soma}")

print("\n--- Teste de Multiplicação (*) ---")
mult = f1 * f2 # 1/2 * 3/4 = 3/8
print(f"{f1} * {f2} = {mult}")

print("\n--- Teste com Operadores Inteiros ---")
soma_int = f1 + 3 # 1/2 + 3/1 = 1/2 + 6/2 = 7/2
mult_int = f2 * 5 # 3/4 * 5/1 = 15/4
print(f"{f1} + 3 = {soma_int}")
print(f"{f2} * 5 = {mult_int}")