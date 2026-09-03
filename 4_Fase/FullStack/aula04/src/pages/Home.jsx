import Titulo from '../components/Titulo';

export default function Home() {
  return (
    <main style={{ padding: '2rem' }}>
      <Titulo texto="Página Inicial" subtexto="Bem-vindo ao site multipáginas criado no Desafio 04!" />
      <p>Navegue pelo menu superior para testar as rotas e o gerenciador de produtos.</p>
    </main>
  );
}