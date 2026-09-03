'use client';

import { useEffect, useState } from 'react';
import axios from 'axios';
import Link from 'next/link';
import { formatarPreco } from '../utils/formatters';

interface Produto {
  id: number;
  title: string;
  price: number;
  description: string;
  image: string;
}

export default function Home() {
  const [produtos, setProdutos] = useState<Produto[]>([]);
  const [busca, setBusca] = useState('');
  const [carregando, setCarregando] = useState(true);

  const pegarDados = async () => {
    try {
      const resposta = await axios.get('https://fakestoreapi.com/products');
      setProdutos(resposta.data);
    } catch (error) {
      console.error('Erro ao buscar produtos:', error);
    } finally {
      setCarregando(false);
    }
  };

  useEffect(() => {
    pegarDados();
  }, []);

  const produtosFiltrados = produtos.filter((item) =>
    item.title.toLowerCase().includes(busca.toLowerCase())
  );

  return (
    <div className="min-h-screen bg-gray-100">
      {/* Cabeçalho */}
      <header className="bg-slate-900 text-white p-4 shadow-md">
        <div className="max-w-6xl mx-auto flex justify-between items-center">
          <h1 className="text-xl font-bold">Vitrine Dev Store</h1>
          <nav className="flex gap-4">
            <Link href="/" className="hover:text-blue-400 transition">Home</Link>
            <Link href="/sobre" className="hover:text-blue-400 transition">Sobre</Link>
          </nav>
        </div>
      </header>

      {/* Conteúdo */}
      <main className="max-w-6xl mx-auto p-6">
        <div className="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
          <h2 className="text-3xl font-bold text-gray-800">Nossos Produtos</h2>
          
          {/* BÔNUS: Campo de Filtro */}
          <input
            type="text"
            placeholder="Buscar produto..."
            value={busca}
            onChange={(e) => setBusca(e.target.value)}
            className="w-full md:w-80 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800"
          />
        </div>

        {carregando ? (
          <p className="text-center text-gray-600">Carregando produtos da API...</p>
        ) : (
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {produtosFiltrados.map((item) => (
              <article key={item.id} className="bg-white rounded-xl p-4 shadow-md flex flex-col justify-between hover:shadow-lg transition">
                <img src={item.image} alt={item.title} className="w-full h-48 object-contain mb-4" />
                <div className="flex-1 flex flex-col justify-between">
                  <h3 className="font-semibold text-gray-800 line-clamp-2 mb-2">{item.title}</h3>
                  <p className="text-xl font-bold text-green-600">{formatarPreco(item.price)}</p>
                </div>
              </article>
            ))}
          </div>
        )}
      </main>
    </div>
  );
}