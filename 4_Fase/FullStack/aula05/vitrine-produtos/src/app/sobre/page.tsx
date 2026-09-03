import Link from 'next/link';

export default function Sobre() {
  return (
    <div className="min-h-screen bg-gray-100">
      <header className="bg-slate-900 text-white p-4 shadow-md">
        <div className="max-w-6xl mx-auto flex justify-between items-center">
          <h1 className="text-xl font-bold">Vitrine Dev Store</h1>
          <nav className="flex gap-4">
            <Link href="/" className="hover:text-blue-400 transition">Home</Link>
            <Link href="/sobre" className="hover:text-blue-400 transition">Sobre</Link>
          </nav>
        </div>
      </header>

      <main className="max-w-4xl mx-auto p-6 mt-10 bg-white rounded-xl shadow-md">
        <h2 className="text-3xl font-bold text-gray-800 mb-4">Sobre o Projeto</h2>
        <p className="text-gray-600 mb-4">
          Aplicação desenvolvida para o Desafio da Aula 05, utilizando Next.js (App Router), Tailwind CSS e Axios.
        </p>
        <p className="text-gray-600">
          A vitrine consome dados em tempo real da API pública FakeStoreAPI e implementa responsividade mobile-first com classes utilitárias do Tailwind CSS.
        </p>
      </main>
    </div>
  );
}