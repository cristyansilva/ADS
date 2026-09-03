import Titulo from '../components/Titulo';

export default function Sobre() {
  return (
    <main style={{ padding: '2rem' }}>
      <Titulo texto="Sobre o Projeto" subtexto="Aplicação Single Page Application (SPA) desenvolvida em React." />
      <p>Este projeto utiliza os seguintes conceitos:</p>
      <ul>
        <li>Componentização e Props</li>
        <li>Gerenciamento de Estado com <code>useState</code></li>
        <li>Renderização de listas com <code>map()</code> e <code>key</code></li>
        <li>Navegação de rotas com <code>React Router</code></li>
      </ul>
    </main>
  );
}