import java.util.Scanner; 

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in); 

        // entrada de dados do Cliente
        System.out.println("--- Cadastro de Cliente ---");
        System.out.print("Código: ");
        int codigoCliente = scanner.nextInt();
        scanner.nextLine(); 
        System.out.print("Nome: ");
        String nomeCliente = scanner.nextLine();
        System.out.print("Telefone: ");
        String telefone = scanner.nextLine();
        Cliente cliente = new Cliente(codigoCliente, nomeCliente, telefone);

        // entrada de dados do imovel
        System.out.println("\n--- Cadastro de Imóvel ---");
        System.out.print("Código: ");
        int codigoImovel = scanner.nextInt();
        scanner.nextLine(); 
        System.out.print("Descrição: ");
        String descricaoImovel = scanner.nextLine();
        System.out.print("Preço Aluguel: ");
        double precoImovel = scanner.nextDouble();
        System.out.print("Mínimo de meses: ");
        int meses = scanner.nextInt();
        Imovel imovel = new Imovel(codigoImovel, descricaoImovel, precoImovel, meses);

        // entrada de dados do aluguel
        System.out.println("\n--- Registro de Aluguel ---");
        System.out.print("Código do Aluguel: ");
        int codigoAluguel = scanner.nextInt();
        System.out.print("Data Início : ");
        String inicio = scanner.next();
        System.out.print("Data Fim : ");
        String fim = scanner.next();
        
        // Instanciação do aluguel associando os objetos criados acima
        Aluguel aluguel = new Aluguel(codigoAluguel, inicio, fim, imovel, cliente);

        //mostra resultado
        System.out.println("\n=========================");
        aluguel.exibeDados(); 
        
        scanner.close();
    }
}