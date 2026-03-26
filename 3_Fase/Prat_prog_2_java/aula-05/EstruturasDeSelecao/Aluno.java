public class Aluno{
    private double media;
    
    public Aluno(double media){
        this.media = media;
    }
    
    public double getMedia(){
        return media;
    }
    
    public static void main(String[] args){
        Aluno alu= new Aluno (5.5);
        
        String mensagem;
        if (alu.getMedia() >=6.0){
            mensagem = "Aprovado";
        } else{
            mensagem = "Reprovado";
        }
        System.out.println("Situação do aluno: "+ mensagem);
    }
}