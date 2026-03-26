import java.util.Scanner;

public class EstruturaSelecao{
    public static void main(String[] args){
        Scanner scanner = new Scanner (System.in);
        
        System.out.print("Digite um numero: ");
        double n = scanner.nextDouble();
        
        double raiz;
        if (n>0) {
            raiz = Math.sqrt(n);
            System.out.println("A raiz quadrade de " + n + " é: " + raiz);
        } else{
        System.out.println("O numero não é positivo, portanto a raiz nao pode ser calculada.");
        }
        scanner.close();
    }
}
