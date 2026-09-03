export default function Titulo({ texto, subtexto }) {
  return (
    <div style={{ marginBottom: '1.5rem' }}>
      <h1 style={{ color: '#2c3e50', marginBottom: '0.2rem' }}>{texto}</h1>
      {subtexto && <p style={{ color: '#7f8c8d' }}>{subtexto}</p>}
    </div>
  );
}