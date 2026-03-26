public class Teste12 {
    public static void exibirNotaConceito(double media) {
        if (media >= 0 && media < 4) { 
            System.out.println("Nota E");
        } else if (media < 5) { 
            System.out.println("Nota D");
        } else if (media < 7) { 
            System.out.println("Nota C");
        } else if (media < 8) { 
            System.out.println("Nota B");
        } else if (media <= 10) { 
            System.out.println("Nota A"); 
        }
    }
}