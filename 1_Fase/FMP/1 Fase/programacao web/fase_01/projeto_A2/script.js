/* ============================================================
   MENU MOBILE
   ============================================================ */
const btnAbrir   = document.getElementById('btn-abrir-menu');
const btnFechar  = document.getElementById('btn-fechar-menu');
const navMenu    = document.getElementById('nav-menu');
const overlay    = document.getElementById('menu-overlay');

function abrirMenu() {
  navMenu.classList.add('active');
  overlay.classList.add('active');
}
function fecharMenu() {
  navMenu.classList.remove('active');
  overlay.classList.remove('active');
}

btnAbrir?.addEventListener('click', abrirMenu);
btnFechar?.addEventListener('click', fecharMenu);
overlay?.addEventListener('click', fecharMenu);
// fecha o menu ao clicar em qualquer link da navegação
navMenu?.querySelectorAll('a').forEach(link => link.addEventListener('click', fecharMenu));

/* ============================================================
   SCROLL SUAVE PARA ÂNCORAS
   ============================================================ */
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', function (e) {
    const href = this.getAttribute('href');
    if (href === '#') return;
    const destino = document.querySelector(href);
    if (destino) {
      e.preventDefault();
      destino.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

/* ============================================================
   CARROSSEL DE DEPOIMENTOS
   ============================================================ */
let current = 0;
const testimonials = document.querySelectorAll('.testimonial');
const dots = document.querySelectorAll('.dot');
let intervaloDepoimentos;

function showTestimonial(index) {
  testimonials.forEach((t, i) => {
    t.classList.toggle('active', i === index);
    dots[i]?.classList.toggle('active', i === index);
  });
  current = index;
}

function iniciarRotacao() {
  intervaloDepoimentos = setInterval(() => {
    current = (current + 1) % testimonials.length;
    showTestimonial(current);
  }, 5000);
}

// reinicia o cronômetro quando o usuário clica num indicador
dots.forEach((dot, i) => {
  dot.addEventListener('click', () => {
    clearInterval(intervaloDepoimentos);
    showTestimonial(i);
    iniciarRotacao();
  });
});

if (testimonials.length) iniciarRotacao();

/* ============================================================
   ANIMAÇÃO DE SCROLL (reveal) + CONTADOR DE MÉTRICAS
   ============================================================ */
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting) return;
    entry.target.classList.add('visivel');

    // se a seção contém números, anima o contador
    entry.target.querySelectorAll('.highlight-number').forEach(animarContador);

    observer.unobserve(entry.target);
  });
}, { threshold: 0.15 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

/* ============================================================
   SCROLLSPY — destaca o link da seção atual no menu
   ============================================================ */
const linksNav = [...document.querySelectorAll('.nav-menu a[href^="#"]')];
const secoesObservadas = linksNav
  .map(link => document.querySelector(link.getAttribute('href')))
  .filter(Boolean);

if (secoesObservadas.length) {
  const spy = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const id = '#' + entry.target.id;
      linksNav.forEach(link => link.classList.toggle('ativo', link.getAttribute('href') === id));
    });
  }, { rootMargin: '-45% 0px -50% 0px' });

  secoesObservadas.forEach(sec => spy.observe(sec));
}

function animarContador(el) {
  const alvo   = parseInt(el.dataset.target, 10) || 0;
  const sufixo = el.dataset.suffix || '';
  const duracao = 1500;
  const inicio = performance.now();

  function passo(agora) {
    const progresso = Math.min((agora - inicio) / duracao, 1);
    el.textContent = Math.floor(progresso * alvo) + sufixo;
    if (progresso < 1) requestAnimationFrame(passo);
  }
  requestAnimationFrame(passo);
}
