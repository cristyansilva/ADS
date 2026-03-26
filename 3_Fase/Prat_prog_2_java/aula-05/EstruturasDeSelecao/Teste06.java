import java.util.Scanner;

public class Teste06 {
    public static void main(String[] args) {
        Scanner leitor = new Scanner(System.in);
        System.out.print("Digite o turno [M-manhã, T-tarde, N-noite]: ");
        char turno = leitor.next().charAt(0);

        if (turno == 'M' || turno == 'm') {
            System.out.println("bom dia"); 
        } else if (turno == 'T' || turno == 't') {
            System.out.println("boa tarde");
        } else if (turno == 'N' || turno == 'n') {
            System.out.println("boa noite");
        } else {
            System.out.println("turno inválido");
        }
    }
}