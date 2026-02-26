public class ExemploFormato {
    public static void main(String[] args) {
        int valorInteiro = 42;
        double valorReal = 3.14159;
        char caractere = 'a';
        String cadeiaCaracteres = "Hello, World";
        boolean valorLogico = true;
        
        System.out.printf("Valor Inteiro: %d\n", valorInteiro);
        System.out.printf("Valor Real: %8.2f\n", valorReal);
        System.out.printf("Caractere: %c\n", caractere);
        System.out.printf("Cadeia de Caracteres: %s\n", cadeiaCaracteres);
        System.out.printf("Valor Logico: %b\n", valorLogico);
        System.out.printf("Quebra de Linha: \n");
    }
}