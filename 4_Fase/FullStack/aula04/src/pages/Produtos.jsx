import { useState } from 'react';
import Titulo from '../components/Titulo';

export default function Produtos() {
  const [produtos, setProdutos] = useState([
    { id: 1, nome: 'Curso de React', preco: '199,00' },
    { id: 2, nome: 'Curso de Node.js', preco: '149,00' },
  ]);

  const [nome, setNome] = useState('');
  const [preco, setPreco] = useState('');

  // Função para adicionar um novo item ao estado (useState + re-render)
  const adicionarProduto = (e) => {
    e.preventDefault();
    if (!nome || !preco) return alert('Preencha todos os campos!');

    const novoProduto = {
      id: Date.now(),
      nome,
      preco,
    };

    setProdutos([...produtos, novoProduto]);
    setNome('');
    setPreco('');
  };

  // Função BÔNUS: Remover item da lista
  const removerProduto = (id) => {
    setProdutos(produtos.filter((p) => p.id !== id));
  };

  return (
    <main style={{ padding: '2rem' }}>
      <Titulo texto="Gerenciador de Produtos" subtexto="Adicione ou remova itens dinamicamente." />

      {/* Formulário de Adição */}
      <form onSubmit={adicionarProduto} style={{ marginBottom: '2rem', display: 'flex', gap: '10px' }}>
        <input
          type="text"
          placeholder="Nome do produto"
          value={nome}
          onChange={(e) => setNome(e.target.value)}
          style={{ padding: '8px' }}
        />
        <input
          type="text"
          placeholder="Preço (ex: 99,00)"
          value={preco}
          onChange={(e) => setPreco(e.target.value)}
          style={{ padding: '8px' }}
        />
        <button type="submit" style={{ padding: '8px 16px', background: '#28a745', color: '#fff', border: 'none', cursor: 'pointer', borderRadius: '4px' }}>
          Adicionar
        </button>
      </form>

      {/* Renderização da lista com map e key */}
      <ul style={{ listStyle: 'none', padding: 0 }}>
        {produtos.map((produto) => (
          <li key={produto.id} style={{ padding: '10px', borderBottom: '1px solid #ccc', display: 'flex', justifyContent: 'space-between', maxWidth: '400px' }}>
            <span><strong>{produto.nome}</strong> — R$ {produto.preco}</span>
            <button 
              onClick={() => removerProduto(produto.id)} 
              style={{ background: '#dc3545', color: '#fff', border: 'none', padding: '4px 8px', cursor: 'pointer', borderRadius: '4px' }}
            >
              Remover
            </button>
          </li>
        ))}
      </ul>
    </main>
  );
}