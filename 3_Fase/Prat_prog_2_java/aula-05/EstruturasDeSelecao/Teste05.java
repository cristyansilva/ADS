import java.util.Scanner;

public class Teste05 {
    public static void main(String[] args) {
        Scanner leitor = new Scanner(System.in);
        System.out.println("Responda com 'true' ou 'false' para A, B, C e D:");
        
        boolean a = leitor.nextBoolean();
        boolean b = leitor.nextBoolean();
        boolean c = leitor.nextBoolean();
        boolean d = leitor.nextBoolean();

        if (a) {
            System.out.println("C1"); 
        }
        
        if (b) {
            System.out.println("C2"); 
        } else if (c) {
            System.out.println("C3"); 
        } else if (d) {
            System.out.println("C4");
            System.out.println("C5"); 
        } else {
            System.out.println("C6"); 
        }
    }
}