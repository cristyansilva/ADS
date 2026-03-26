import java.util.Scanner;
public class Teste02 {
    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        int a, b, c, guarda;
        System.out.println("Digite o valor de a: ");
        a = teclado.nextInt();
        System.out.println("Digite o valor de b: ");
        b = teclado.nextInt();
        System.out.println("Digite o valor de c: ");
        c = teclado.nextInt();
        System.out.println("\n--- Rastreamento ---");
        if (a < b) {
            System.out.println("if 1: True");
            guarda = a; 
            a = b; 
            b = guarda;
        } else {
            System.out.println("if 1: False");
        }
        if (b < c) {
            System.out.println("if 2: True");
            guarda = b; 
            b = c; 
            c = guarda;

            if (a < b) {
                System.out.println("if 3: True");
                guarda = a; 
                a = b; 
                b = guarda;
            } else {
                System.out.println("if 3: False");
            }
        } else {
            System.out.println("if 2: False (if 3 não será executado)");
        }
    }
}




/*
 * 3, 7 e 5: if 1 e if 2 resultam em true. O if 3 é executado mas resulta em false.

3, 5 e 7: Todos os três ifs (if 1, if 2 e if 3) resultam em true.

5, 3 e 7: O if 1 é false. O if 2 e if 3 resultam em true.

5, 7 e 3: Apenas o if 1 resulta em true. O if 2 é false, logo o if 3 
nem sequer é testado.
*/





