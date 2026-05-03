public class ListaDeAlunos {
    private Aluno[] alunos; // Array unidimensional obrigatório (sem ArrayList)
    private int totalAlunos;

    public ListaDeAlunos(int capacidade) {
        alunos = new Aluno[capacidade];
        totalAlunos = 0;
    }

    public boolean adicionarAluno(Aluno a) {
        // Verifica duplicidade por código
        for (int i = 0; i < totalAlunos; i++) {
            if (alunos[i].getCodigo() == a.getCodigo()) {
                System.out.println("Erro: Já existe um aluno cadastrado com este código.");
                return false;
            }
        }
        
        // Verifica limite de vagas
        if (totalAlunos >= alunos.length) {
            System.out.println("Erro: Capacidade máxima do sistema atingida.");
            return false;
        }

        alunos[totalAlunos] = a;
        totalAlunos++;
        return true;
    }

    public void exibirLista() {
        if (totalAlunos == 0) {
            System.out.println("Nenhum aluno cadastrado no momento.");
            return;
        }
        for (int i = 0; i < totalAlunos; i++) {
            alunos[i].exibeDados();
        }
    }

    // Método auxiliar para buscar aluno pelo código
    public Aluno buscarAluno(int codigo) {
        for (int i = 0; i < totalAlunos; i++) {
            if (alunos[i].getCodigo() == codigo) {
                return alunos[i];
            }
        }
        return null; // Retorna null se não encontrar
    }
    
    // Getters para uso externo seguro (como na listagem de cursos)
    public Aluno[] getAlunosArray() { return alunos; }
    public int getTotalAlunos() { return totalAlunos; }
}