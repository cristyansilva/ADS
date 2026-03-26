public class Professor extends Usuario{
    private String areaAtuacao;
    
    public Professor(int mat, String nom, String log, String sen){
        super(mat, nom, log, sen);
    }
    
    public String getAreaAtuacao(){
        return areaAtuacao;
    }
    
    public void setAreaAtuacao(String are){
        areaAtuacao = are;
    }
    
    
}