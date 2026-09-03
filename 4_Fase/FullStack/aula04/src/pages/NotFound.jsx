import { Link } from 'react-router-dom';

export default function NotFound() {
  return (
    <main style={{ padding: '2rem', textAlign: 'center' }}>
      <h1>404 - Página Não Encontrada</h1>
      <p>Ops! A página que você está procurando não existe.</p>
      <Link to="/" style={{ color: '#007bff' }}>Voltar para a Página Inicial</Link>
    </main>
  );
}