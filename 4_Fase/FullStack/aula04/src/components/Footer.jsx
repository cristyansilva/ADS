export default function Footer({ autor }) {
  return (
    <footer style={{ padding: '1rem', background: '#1a1a1a', color: '#888', textAlign: 'center', marginTop: '3rem' }}>
      <p>&copy; 2026 - Desenvolvido por {autor}. Todos os direitos reservados.</p>
    </footer>
  );
}