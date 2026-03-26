import java.util.Scanner;

public class Teste11 {
    public static void realizarCalculo(int a, int b) {
        Scanner leitor = new Scanner(System.in);
        System.out.println("========= MENU =========="); 
        System.out.println(" 1- Adição\n 2- Subtração\n 3- Multiplicação\n 4- Divisão");
        int op = leitor.nextInt();
        int resultado;
        switch (op) { 
            case 1: 
                resultado = a + b; 
                System.out.println("O resultado da adição é: " + resultado); 
                break; 
            case 2: 
                resultado = a - b; 
                System.out.println("O resultado da subtração é: " + resultado); 
                break; 
            case 3: 
                resultado = a * b; 
                System.out.println("O resultado da multiplicação é: " + resultado);
                break;
            case 4: 
                if (b != 0) {
                    resultado = a / b; 
                    System.out.println("O resultado da divisão é: " + resultado); 
                } else {
                    System.out.println("Erro: Divisão por zero!");
                }
                break;
            default: 
                System.out.println("Opção inválida!"); 
        }
    }
}