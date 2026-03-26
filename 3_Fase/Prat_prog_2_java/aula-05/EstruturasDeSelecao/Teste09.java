public class Teste09 {
    public static void exibirMensagem(int idade, double peso) {
        if (idade <= 14) {
            System.out.println("Categoria: Infantil"); 
        } else if (idade <= 17) {
            if (peso <= 50) System.out.println("Juvenil leve");
            else System.out.println("Juvenil pesado"); 
        } else if (idade <= 25) {
            if (peso <= 60) System.out.println("Senior leve");
            else System.out.println("Senior pesado"); 
        } else {
            System.out.println("Veterano");
        }
    }
}