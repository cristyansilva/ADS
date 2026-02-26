import java.util.Scanner;

public class ExemploScanner {
    public static void main(String[] args){
    //crie um objeto scanner para ler a entrada do teclado (input)
    Scanner scanner = new Scanner(System.in);
    
    //peça ao usuario para inserir os dados
    System.out.print("Digite seu nome: ");
    String nome = scanner.nextLine(); //leitura de uma linha (string)
    
    //pedindo outra entrada
    System.out.print("Digite sua idade: ");
    int idade = scanner.nextInt(); //leitura de um numero inteiro
    
    //exibit infos 
    System.out.println("Nome: "+ nome);
    System.out.println("Idade: " + idade);
    
    //fecha o obj scanner para liberar recursos
    scanner.close();
    }
}