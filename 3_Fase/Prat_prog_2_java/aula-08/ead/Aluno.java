public class Aluno {
    // Atributos básicos
    private int codigo;
    private String nome;
    private String dataNascimento;
    private String email;
    private String senha;
    
    // Associação com Curso (Parte 02 - Opção A)
    private Curso cursoMatriculado;

    // Controle de Notas (Parte 04) - Arrays Unidimensionais
    private double[] notas = new double[3];
    private boolean[] lancada = new boolean[3];

    // Controle Financeiro (Parte 05) - Array Unidimensional
    private Mensalidade[] mensalidades;
    private int numParcelas;

    public Aluno(int codigo, String nome, String dataNascimento, String email, String senha) {
        this.codigo = codigo;
        this.nome = nome;
        this.dataNascimento = dataNascimento;
        this.email = email;
        this.senha = senha;
        
        // Inicializa o controle de notas como falso
        for (int i = 0; i < 3; i++) {
            lancada[i] = false;
        }
    }

    // Getters
    public int getCodigo() { return codigo; }
    public String getNome() { return nome; }
    public Curso getCursoMatriculado() { return cursoMatriculado; }

    // Setters
    public void setCursoMatriculado(Curso curso) { this.cursoMatriculado = curso; }

    // Parte 01 e 03: Exibição de dados (será sobrescrito na subclasse)
    public void exibeDados() {
        System.out.println("-----------------------------------");
        System.out.println("Código: " + codigo + " | Nome: " + nome);
        System.out.println("Nascimento: " + dataNascimento + " | Email: " + email);
        if (cursoMatriculado != null) {
            System.out.println("Matriculado no curso: " + cursoMatriculado.getNome());
        } else {
            System.out.println("Status: Não matriculado em nenhum curso.");
        }
    }

    // Parte 04: Lançamento e cálculo de notas
    public void lancarNotas(double n1, double n2, double n3) {
        notas[0] = n1; lancada[0] = true;
        notas[1] = n2; lancada[1] = true;
        notas[2] = n3; lancada[2] = true;
        System.out.println("Notas lançadas com sucesso para o aluno " + nome);
    }

    public double calcularMedia() {
        if (!lancada[0]) return 0.0;
        return (notas[0] + notas[1] + notas[2]) / 3.0;
    }

    public void exibirNotas() {
        System.out.println("--- Notas do Aluno: " + nome + " ---");
        if (lancada[0]) {
            for (int i = 0; i < 3; i++) {
                System.out.println("Nota " + (i + 1) + ": " + notas[i]);
            }
            System.out.printf("Média Final: %.2f\n", calcularMedia());
        } else {
            System.out.println("Aviso: As notas ainda não foram lançadas.");
        }
    }

    // Parte 05: Gestão Financeira
    public void adicionarMensalidades(double[] valores) {
        this.numParcelas = valores.length;
        this.mensalidades = new Mensalidade[numParcelas];
        for (int i = 0; i < numParcelas; i++) {
            this.mensalidades[i] = new Mensalidade(valores[i]);
        }
    }

    public void exibirMensalidades() {
        System.out.println("--- Situação Financeira: " + nome + " ---");
        if (mensalidades == null) {
            System.out.println("Nenhum plano financeiro cadastrado.");
            return;
        }
        for (int i = 0; i < numParcelas; i++) {
            String status = mensalidades[i].isPago() ? "[PAGO]" : "[PENDENTE]";
            System.out.printf("Parcela %d: R$ %.2f - %s\n", (i + 1), mensalidades[i].getValor(), status);
        }
    }

    public void pagarMensalidade(int indice) {
        if (mensalidades == null) {
            System.out.println("Nenhum plano financeiro cadastrado.");
            return;
        }
        int pos = indice - 1; // Ajuste de índice (usuário digita 1 para índice 0)
        if (pos >= 0 && pos < numParcelas) {
            if (!mensalidades[pos].isPago()) {
                mensalidades[pos].darBaixa();
                System.out.println("Parcela " + indice + " paga com sucesso!");
            } else {
                System.out.println("Esta parcela já consta como paga.");
            }
        } else {
            System.out.println("Número de parcela inválido!");
        }
    }
}