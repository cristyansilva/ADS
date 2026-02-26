public class ExemploEntradaParqueDiversao{
    public static void main(String args[]){
        //declarar as variaveis e atribuir aos valores para as variaveis com os comandos de entrada
        // - seuNome, primeiraLetraNome, idade
        String seuNome = Teclado.leString("Nome do participante: ");
        char primeiraLetraNome = Teclado.leChar("Primeira Letra do Nome do participante: ");
        int idade = Teclado.leInt("Idade do participante: ");
        
        System.out.print("Olá ");
        System.out.println(seuNome);
        System.out.printf("A primeira letra do seu nome é: %c. \n", primeiraLetraNome);
        System.out.printf("Sua idade é: %d.", idade);
        
    }
}