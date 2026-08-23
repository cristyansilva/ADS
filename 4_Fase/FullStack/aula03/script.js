let quantidadeCadastros = 0;

const usuarios = [];

const form = document.getElementById("userForm");
const statusMsg = document.getElementById("mensagemStatus");
const listaUsuarios = document.getElementById("listaUsuarios");
const campoBusca = document.getElementById("campoBusca");
const btnOrdenar = document.getElementById("btnOrdenar");
const btnRemover = document.getElementById("btnRemover");

// Tipos de dados
const nomeTeste = "Painel de Usuários";
const idadeTeste = 20;
const sistemaAtivo = true;

console.log("Tipos de Dados Utilizados");
console.log("nomeTeste:", typeof nomeTeste);
console.log("idadeTeste:", typeof idadeTeste);
console.log("sistemaAtivo:", typeof sistemaAtivo);


const classificarIdade = (idade) => {
    if (idade <= 17) {
        return "Menor de idade";
    } else if (idade <= 59) {
        return "Adulto";
    } else {
        return "Idoso";
    }
};


// Função para renderizar os usuários
function renderizarLista(lista) {
    listaUsuarios.innerHTML = "";

    lista.forEach((usuario) => {
        const cardHTML = `
            <div class="user-card">
                <h3>${usuario.nome}</h3>
                <p><strong>Idade:</strong> ${usuario.idade} anos</p>
                <p><strong>Categoria:</strong> ${usuario.categoria}</p>
                <p><strong>E-mail:</strong> ${usuario.email}</p>
            </div>
        `;

        listaUsuarios.innerHTML += cardHTML;
    });
}


// Cadastro do usuário
form.addEventListener("submit", (event) => {
    event.preventDefault();

    const nome = document.getElementById("nome").value;
    const idade = Number(document.getElementById("idade").value);
    const email = document.getElementById("email").value;

    const categoria = classificarIdade(idade);

    const novoUsuario = {
        nome: nome,
        idade: idade,
        email: email,
        categoria: categoria
    };

    usuarios.push(novoUsuario);

    quantidadeCadastros++;

    statusMsg.textContent =
        `Usuário ${nome} (${categoria}) cadastrado com sucesso!`;

    renderizarLista(usuarios);

    form.reset();
});


btnOrdenar.addEventListener("click", () => {
    usuarios.sort((a, b) => a.nome.localeCompare(b.nome));

    renderizarLista(usuarios);

    statusMsg.textContent = "Usuários ordenados por nome.";
});


btnRemover.addEventListener("click", () => {

    if (usuarios.length === 0) {
        statusMsg.textContent = "Não há usuários para remover.";
        return;
    }

    usuarios.pop();

    quantidadeCadastros--;

    renderizarLista(usuarios);

    statusMsg.textContent = "Último usuário removido com sucesso.";
});


campoBusca.addEventListener("input", (event) => {

    const termoBusca = event.target.value.toLowerCase();

    const usuariosFiltrados = usuarios.filter((usuario) =>
        usuario.nome.toLowerCase().includes(termoBusca)
    );

    renderizarLista(usuariosFiltrados);
});


btnOrdenar.addEventListener("mouseover", () => {
    btnOrdenar.title = "Clique para ordenar os usuários de A a Z";
});