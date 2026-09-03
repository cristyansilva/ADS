export function calcularDesconto(preco: number, percentual: number): number {
  if (preco < 0 || percentual < 0) return 0;
  return preco - (preco * percentual) / 100;
}

export function formatarPreco(preco: number): string {
  return `R$ ${preco.toFixed(2).replace('.', ',')}`;
}