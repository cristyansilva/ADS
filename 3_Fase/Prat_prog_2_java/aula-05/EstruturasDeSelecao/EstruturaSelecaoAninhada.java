import java.util.Scanner;
public class EstruturaSelecaoAninhada{
    public static void main(String[] args){
        Scanner scanner = new Scanner(System.in);
        
        System.out.print("Digite o valor de x: ");
        int x = scanner.nextInt();
        
        System.out.print("Digite o valor de y: ");
        int y = scanner.nextInt();
        
        System.out.print("Digite o valor de z: ");
        int z = scanner.nextInt();
        
        int r = 0;
        
        if (x > y){
            if (x>z){
                if(y!= z){
                    r=1;
                }
            }
        }
        System.out.println("Valor de r: " + r);
        scanner.close();
    }
}