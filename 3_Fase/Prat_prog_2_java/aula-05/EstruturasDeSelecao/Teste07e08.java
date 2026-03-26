public class Teste07e08 {
    public static void main(String[] args) {
        exibirMensagem(10); 
        System.out.println("Menor número: " + retornarMenor(5, 3, 7)); 
    }

    // Questão 7
    public static void exibirMensagem(int num) {
        if (num > 0) System.out.println(num + " Positivo");
        else if (num < 0) System.out.println(num + " Negativo");
        else System.out.println(num + " Zero");
    }

    // Questão 8
    public static int retornarMenor(int n1, int n2, int n3) {
        int menor = n1;
        if (n2 < menor) menor = n2;
        if (n3 < menor) menor = n3;
        return menor;
    }
}