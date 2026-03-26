import java.util.Scanner;

public class VerificaAprovacao {
    public static void main (String[] args){
        Scanner scanner = new Scanner(System.in);
        
        System.out.print("Digite a media do aluno: ");
        double media = scanner.nextDouble();
        
        if (media >=6){
            System.out.println("Aprovado");
        } else {
            System.out.println("Precisa de recuperação");
        }
        scanner.close();
    }
}
