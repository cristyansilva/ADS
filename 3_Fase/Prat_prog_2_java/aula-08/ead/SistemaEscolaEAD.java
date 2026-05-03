import java.util.Scanner;

public class SistemaEscolaEAD {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ListaDeAlunos lista = new ListaDeAlunos(50); // Capacidade para 50 alunos
        
        // Parte 02 - Opção B: Matriz bidimensional obrigatória (por semestre/área)
        // Linha 0: Tecnologia | Linha 1: Negócios
        Curso[][] matrizCursos = new Curso[2][2];
        matrizCursos[0][0] = new Curso(101, "Java Básico", 40);
        matrizCursos[0][1] = new Curso(102, "POO Avançado", 60);
        matrizCursos[1][0] = new Curso(201, "Gestão EAD", 30);
        matrizCursos[1][1] = new Curso(202, "Marketing Digital", 40);

        int opcao = -1;

        System.out.println("Bem-vindo ao Sistema Escola EAD");

        while (opcao != 6) {
            System.out.println("\n=== MENU PRINCIPAL ===");
            System.out.println("1 - Visualizar Lista de Alunos");
            System.out.println("2 - Adicionar Aluno e Matricular");
            System.out.println("3 - Verificar/Lançar Notas do Aluno");
            System.out.println("4 - Verificar Financeiro do Aluno");
            System.out.println("5 - Exibir Relatório de Cursos (Matrículas)");
            System.out.println("6 - Sair");
            System.out.print("Escolha uma opção: ");
            
            opcao = scanner.nextInt();
            scanner.nextLine(); // Consumir a quebra de linha

            switch (opcao) {
                case 1:
                    System.out.println("\n--- Lista Geral de Alunos ---");
                    lista.exibirLista();
                    break;

                case 2:
                    System.out.println("\n--- Adicionar Novo Aluno ---");
                    System.out.print("Código: ");
                    int cod = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Nome: ");
                    String nome = scanner.nextLine();
                    System.out.print("Data de Nascimento: ");
                    String dtNasc = scanner.nextLine();
                    System.out.print("Email: ");
                    String email = scanner.nextLine();
                    System.out.print("Senha: ");
                    String senha = scanner.nextLine();
                    
                    System.out.print("O aluno é bolsista? (1-Sim / 2-Não): ");
                    int opBolsa = scanner.nextInt();
                    scanner.nextLine();
                    
                    Aluno novoAluno;
                    if (opBolsa == 1) {
                        System.out.print("Digite o tipo da bolsa (Ex: Integral, Parcial 50%): ");
                        String tipoBolsa = scanner.nextLine();
                        novoAluno = new AlunoBolsista(cod, nome, dtNasc, email, senha, tipoBolsa);
                    } else {
                        novoAluno = new Aluno(cod, nome, dtNasc, email, senha);
                    }
                    
                    // Exibir catálogo da matriz bidimensional para escolha
                    System.out.println("\nCatálogo de Cursos (Matriz):");
                    for (int i = 0; i < matrizCursos.length; i++) {
                        for (int j = 0; j < matrizCursos[i].length; j++) {
                            matrizCursos[i][j].exibeDados();
                        }
                    }
                    
                    System.out.print("Digite o código do curso para matricular: ");
                    int codCurso = scanner.nextInt();
                    scanner.nextLine();
                    
                    // Buscar o curso na matriz e associar
                    for (int i = 0; i < matrizCursos.length; i++) {
                        for (int j = 0; j < matrizCursos[i].length; j++) {
                            if (matrizCursos[i][j].getCodigo() == codCurso) {
                                novoAluno.setCursoMatriculado(matrizCursos[i][j]);
                            }
                        }
                    }

                    // Gerar financeiro padrão simulado (3 parcelas de 250.00)
                    double[] planoFinanceiro = {250.00, 250.00, 250.00};
                    novoAluno.adicionarMensalidades(planoFinanceiro);
                    
                    if (lista.adicionarAluno(novoAluno)) {
                        System.out.println("Aluno cadastrado e matriculado com sucesso!");
                    }
                    break;

                case 3:
                    System.out.println("\n--- Notas do Aluno ---");
                    System.out.print("Digite o código do aluno: ");
                    int codNota = scanner.nextInt();
                    Aluno aNota = lista.buscarAluno(codNota);
                    
                    if (aNota != null) {
                        System.out.println("1 - Lançar Notas | 2 - Exibir Notas e Média");
                        int acao = scanner.nextInt();
                        if (acao == 1) {
                            System.out.print("Nota 1: "); double n1 = scanner.nextDouble();
                            System.out.print("Nota 2: "); double n2 = scanner.nextDouble();
                            System.out.print("Nota 3: "); double n3 = scanner.nextDouble();
                            aNota.lancarNotas(n1, n2, n3);
                        } else {
                            aNota.exibirNotas();
                        }
                    } else {
                        System.out.println("Aluno não encontrado.");
                    }
                    break;

                case 4:
                    System.out.println("\n--- Financeiro do Aluno ---");
                    System.out.print("Digite o código do aluno: ");
                    int codFin = scanner.nextInt();
                    Aluno aFin = lista.buscarAluno(codFin);
                    
                    if (aFin != null) {
                        aFin.exibirMensalidades();
                        System.out.print("\nDeseja pagar alguma parcela? (Digite o número da parcela ou 0 para voltar): ");
                        int numParcela = scanner.nextInt();
                        if (numParcela > 0) {
                            aFin.pagarMensalidade(numParcela);
                        }
                    } else {
                        System.out.println("Aluno não encontrado.");
                    }
                    break;

                case 5:
                    System.out.println("\n--- Relatório de Cursos e Matrículas (Exigência Parte 02) ---");
                    // Navega na matriz bidimensional de cursos
                    for (int i = 0; i < matrizCursos.length; i++) {
                        for (int j = 0; j < matrizCursos[i].length; j++) {
                            Curso cAtual = matrizCursos[i][j];
                            System.out.println("\nCurso: " + cAtual.getNome() + " | Duração: " + cAtual.getDuracao() + "h");
                            System.out.println("Alunos matriculados:");
                            
                            boolean encontrou = false;
                            Aluno[] arrayAlunos = lista.getAlunosArray();
                            int total = lista.getTotalAlunos();
                            
                            // Navega no array unidimensional de alunos
                            for (int k = 0; k < total; k++) {
                                Curso cAluno = arrayAlunos[k].getCursoMatriculado();
                                if (cAluno != null && cAluno.getCodigo() == cAtual.getCodigo()) {
                                    System.out.println("- " + arrayAlunos[k].getNome() + " (Código " + arrayAlunos[k].getCodigo() + ")");
                                    encontrou = true;
                                }
                            }
                            if (!encontrou) {
                                System.out.println("- Nenhum aluno matriculado neste curso.");
                            }
                        }
                    }
                    break;

                case 6:
                    System.out.println("Encerrando o Sistema Escola EAD... Até logo!");
                    break;

                default:
                    System.out.println("Opção inválida! Tente novamente.");
            }
        }
        scanner.close();
    }
}