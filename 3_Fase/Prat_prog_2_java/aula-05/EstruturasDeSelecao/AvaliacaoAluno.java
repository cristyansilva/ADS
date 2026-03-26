public class AvaliacaoAluno{
    public static String classificarDesempenho(double media){
        if (media >= 9.3){
            return "Otimo";
        } else if (media >= 8.5){
            return "bom";
        } else if (media >=6.0){
            return "Aprovado";
        } else{
            return "Em recuperação";
        }
    }
    
    public static void main(String[] args){
        double media = 7.5;
        System.out.println("Desempenho: " + classificarDesempenho(media));
    }
}