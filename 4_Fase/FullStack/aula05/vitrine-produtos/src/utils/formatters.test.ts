import { calcularDesconto, formatarPreco } from './formatters';

describe('Funções Utilitárias de Preço', () => {
  test('deve calcular o desconto de 10% corretamente', () => {
    const resultado = calcularDesconto(100, 10);
    expect(resultado).toBe(90);
  });

  test('deve formatar o preço no padrão brasileiro (R$)', () => {
    const precoFormatado = formatarPreco(100);
    expect(precoFormatado).toBe('R$ 100,00');
  });
});