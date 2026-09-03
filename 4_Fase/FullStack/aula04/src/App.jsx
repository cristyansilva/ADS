import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Header from './components/Header';
import Footer from './components/Footer';
import Home from './pages/Home';
import Sobre from './pages/Sobre';
import Produtos from './pages/Produtos';
import NotFound from './pages/NotFound';

export default function App() {
  return (
    <BrowserRouter>
      <Header />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/sobre" element={<Sobre />} />
        <Route path="/produtos" element={<Produtos />} />
        {/* Rota 404 Bônus */}
        <Route path="*" element={<NotFound />} />
      </Routes>
      <Footer autor="Cristyan" />
    </BrowserRouter>
  );
}