import { Link } from 'react-router-dom';

export default function Header() {
  return (
    <header style={{ padding: '1rem 2rem', background: '#1a1a1a', color: '#fff', display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
      <h2 style={{ margin: 0 }}>Meu Projeto React</h2>
      <nav style={{ display: 'flex', gap: '15px' }}>
        <Link to="/" style={{ color: '#61dafb', textDecoration: 'none' }}>Home</Link>
        <Link to="/sobre" style={{ color: '#61dafb', textDecoration: 'none' }}>Sobre</Link>
        <Link to="/produtos" style={{ color: '#61dafb', textDecoration: 'none' }}>Produtos</Link>
      </nav>
    </header>
  );
}