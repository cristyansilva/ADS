import java.util.Scanner; 

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in); 

        // entrada de dados do Cliente
        System.out.println("--- Cadastro de Cliente ---");
        System.out.print("Código: ");
        int codCli = scanner.nextInt();
        scanner.nextLine(); 
        System.out.print("Nome: ");
        String nome = scanner.nextLine();
        System.out.print("Telefone: ");
        String tel = scanner.nextLine();
        Cliente cliente = new Cliente(codCli, nome, tel);

        // entrada de dados do imovel
        System.out.println("\n--- Cadastro de Imóvel ---");
        System.out.print("Código: ");
        int codImov = scanner.nextInt();
        scanner.nextLine(); 
        System.out.print("Descrição: ");
        String desc = scanner.nextLine();
        System.out.print("Preço Aluguel: ");
        double preco = scanner.nextDouble();
        System.out.print("Mínimo de meses: ");
        int meses = scanner.nextInt();
        Imovel imovel = new Imovel(codImov, desc, preco, meses);

        // entrada de dados do aluguel
        System.out.println("\n--- Registro de Aluguel ---");
        System.out.print("Código do Aluguel: ");
        int codAlu = scanner.nextInt();
        System.out.print("Data Início : ");
        String inicio = scanner.next();
        System.out.print("Data Fim : ");
        String fim = scanner.next();
        
        // Instanciação do aluguel associando os objetos criados acima
        Aluguel aluguel = new Aluguel(codAlu, inicio, fim, imovel, cliente);

        //mostra resultado
        System.out.println("\n=========================");
        aluguel.exibeDados(); 
        
        scanner.close();
    }
}