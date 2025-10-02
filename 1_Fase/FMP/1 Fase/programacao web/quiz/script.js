const questions = [
  {
    question: "Missão principal da FMP?",
    answers: [
      "Cursos de pós-graduação.",
      "Maior universidade privada.",
      "Desenvolvimento educacional e social de Palhoça.",
      "Apenas cursos técnicos."
    ],
    correct: 2
  },
  {
    question: "Ano de fundação da FMP?",
    answers: ["2010", "2013", "2005", "2018"],
    correct: 2
  },
  {
    question: "Bairro da sede principal da FMP?",
    answers: ["Ponte do Imaruim", "Aririú", "Centro", "Passa Vinte"],
    correct: 0
  },
  {
    question: "Objetivo do curso ADS da FMP?",
    answers: [
      "Marketing digital.",
      "Engenharia civil.",
      "Desenvolvimento, análise de softwares.",
      "Hardware e redes."
    ],
    correct: 2
  },
  {
    question: "Duração média do curso ADS na FMP?",
    answers: [
      "2 anos",
      "4 anos",
      "2 anos e meio (5 semestres)",
      "3 anos e meio"
    ],
    correct: 2
  },
  {
    question: "Área de atuação do profissional em ADS?",
    answers: [
      "Nutrição.",
      "Design de moda.",
      "Desenvolvimento de softwares, bancos de dados, análise de sistemas.",
      "Publicidade."
    ],
    correct: 2
  },
  {
    question: "Quem é o (a) Presidente Geral da FMP?",
    answers: [
      "Jair Joaquim Pereira.",
      "Mariah Terezinha Nascimento Pereira",
      "Não possui diretoria, é autogerenciável",
      "Débora Raquel Schutz"
    ],
    correct: 3
  },
  {
    question: "Regime de aulas do curso ADS na FMP?",
    answers: ["Matutino", "Noturno", "Apenas sábados", "EAD exclusivo"],
    correct: 0
  },
  {
    question: "Importância de lógica de programação na 1ª fase de ADS?",
    answers: [
      "Preencher carga horária.",
      "Irrelevante.",
      "Desenvolver jogos.",
      "Base para raciocínio e codificação."
    ],
    correct: 3
  },
  {
    question: "Principal ferramenta de comunicação FMP-aluno?",
    answers: [
      "Murais.",
      "Cartas.",
      "Portal do Aluno / E-mail institucional.",
      "WhatsApp não-oficial."
    ],
    correct: 2
  },
  {
    question: "Localização da biblioteca da FMP?",
    answers: [
      "Prédio anexo",
      "Dentro do prédio da FMP",
      "Apenas virtual",
      "Prédio distante"
    ],
    correct: 1
  },
  {
    question: "Relevância do Estágio Supervisionado para ADS?",
    answers: [
      "É obrigatório.",
      "Aplicação prática e contato com o mercado",
      "Cumprir horas extras.",
      "Relatório para o acervo da faculdade"
    ],
    correct: 1
  },
  {
    question: "Qual tipo de evento não é promovido pela FMP?",
    answers: [
      "Festa junina",
      "Eventos esportivos",
      "Semanas acadêmicas",
      "Somente sobre consciência literária"
    ],
    correct: 3
  },
  {
    question: "Área de conhecimento do curso ADS?",
    answers: ["Humanas.", "Biológicas.", "Exatas / Tecnologia da Informação.", "Agrárias."],
    correct: 2
  },
  {
    question: "Cidade da FMP?",
    answers: ["Florianópolis", "Palhoça", "São José", "Biguaçu"],
    correct: 1
  },
  {
    question: "Qual é o principal objetivo das ações de Responsabilidade Social da FMP?",
    answers: [
      "Promover eventos culturais no campus.",
      "Incentivar o consumo local.",
      "Integrar atividades acadêmicas com ações que atendam famílias em situação de vulnerabilidade.",
      "Aumentar a visibilidade da instituição na mídia."
    ],
    correct: 2
  },
  {
    question: "O que significa a sigla CPA no contexto da FMP?",
    answers: [
      "Comissão de Planejamento Acadêmico",
      "Conselho de Professores Associados",
      "Comissão Própria de Avaliação",
      "Comitê de Programação e Avaliação"
    ],
    correct: 2
  },
  {
    question: "Qual é o público-alvo do Programa da Maturidade da FMP?",
    answers: [
      "Pessoas a partir de 50 anos",
      "Crianças e adolescentes",
      "Estudantes do ensino médio",
      "Profissionais da área da saúde"
    ],
    correct: 0
  },
  {
    question: "Qual é a natureza das atividades oferecidas no Programa da Maturidade?",
    answers: [
      "Lúdicas, físicas, artísticas e culturais",
      "Exclusivamente teóricas",
      "Voltadas à capacitação profissional",
      "Técnicas e laboratoriais"
    ],
    correct: 0
  },
  {
    question: "A partir de qual fase os alunos da FMP podem fazer estágio não obrigatório?",
    answers: [
      "Somente após concluir 50% do curso",
      "Apenas a partir da 3ª fase",
      "Desde a 1ª fase, se cumprirem os requisitos legais",
      "Depois do estágio obrigatório"
    ],
    correct: 2
  },
  {
    question: "Qual é a carga horária máxima permitida para o Estágio Não Obrigatório?",
    answers: [
      "4 horas diárias",
      "6 horas diárias ou 30 horas semanais",
      "40 horas semanais",
      "8 horas diárias"
    ],
    correct: 1
  },
  {
    question: "O que caracteriza o Estágio Não Obrigatório na FMP?",
    answers: [
      "É obrigatório e supervisionado pelo MEC",
      "Deve ser realizado somente no último semestre",
      "É voltado exclusivamente para pesquisa acadêmica",
      "É opcional, de natureza prática e remunerada"
    ],
    correct: 3
  },
  {
    question: "Onde devem ser entregues os documentos do Estágio Não Obrigatório na FMP?",
    answers: [
      "Na Secretaria Acadêmica, com todas as vias assinadas",
      "Diretamente ao coordenador do curso",
      "No Google Classroom",
      "Por e-mail para a diretoria"
    ],
    correct: 0
  },
  {
    question: "Quais cursos de graduação são oferecidos pela Faculdade Municipal de Palhoça (FMP)?",
    answers: [
      "Administração, Pedagogia, Gestão de Turismo, Análise e Desenvolvimento de Sistemas, Processos Gerenciais.",
      "Administração, Pedagogia, Gestão de Turismo, Análise e Desenvolvimento de Sistemas",
      "Administração, Pedagogia, Processos Gerenciais, Análise e Desenvolvimento de Sistemas",
      "Administração, Pedagogia, Gestão de Turismo"
    ],
    correct: 2
  },
  {
    question: "O que é o SGA da Faculdade Municipal de Palhoça (FMP)?",
    answers: [
      "Sistema de Gestão de Atividades Esportivas da FMP.",
      "Sistema de Gestão de Alunos utilizado para matrícula, consulta de notas e frequência.",
      "Plataforma para inscrições em eventos culturais da faculdade.",
      "Sistema exclusivo para professores gerenciarem suas turmas."
    ],
    correct: 1
  }
];

let currentQuestion = 0;
let score = 0;

const questionNumberEl = document.getElementById("question-number");
const questionTextEl = document.getElementById("question-text");
const answersEl = document.getElementById("answers");
const nextBtn = document.getElementById("next");
const resultBox = document.getElementById("result");
const resultText = document.getElementById("score");
const restartBtn = document.getElementById("restart");

function showQuestion() {
  const q = questions[currentQuestion];
  questionNumberEl.textContent = currentQuestion + 1;
  questionTextEl.textContent = q.question;
  answersEl.innerHTML = "";
  nextBtn.disabled = true;

  q.answers.forEach((answer, index) => {
    const btn = document.createElement("button");
    btn.innerHTML = `<span>${String.fromCharCode(65 + index)}</span> ${answer}`;
    btn.addEventListener("click", () => selectAnswer(btn, index === q.correct, index, q.correct));
    answersEl.appendChild(btn);
  });
}

function selectAnswer(button, isCorrect, selectedIndex, correctIndex) {
  const buttons = answersEl.querySelectorAll("button");
  buttons.forEach(btn => btn.disabled = true);

  if (isCorrect) {
    button.classList.add("correct");
    score++;
  } else {
    button.classList.add("incorrect");
    buttons[correctIndex].classList.add("correct");
  }

  nextBtn.disabled = false;
}

nextBtn.addEventListener("click", () => {
  currentQuestion++;
  if (currentQuestion < questions.length) {
    showQuestion();
  } else {
    document.getElementById("quiz").classList.add("hidden");
    resultBox.classList.remove("hidden");
    resultText.textContent = `Você acertou ${score} de ${questions.length} perguntas.`;
  }
});

restartBtn.addEventListener("click", () => {
  currentQuestion = 0;
  score = 0;
  resultBox.classList.add("hidden");
  document.getElementById("quiz").classList.remove("hidden");
  showQuestion();
});

showQuestion();