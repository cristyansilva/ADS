public class Cofrinho{
    private Pessoa dono;
    private int qt50;
    private int qt25;
    private int qt10;
    
    //construtor que passa parametro tipo pessoa
    public Cofrinho (Pessoa umaPessoa){
        dono = umaPessoa;
    }
    
    //construtor que passa dois parametros e instaicia no mesmo metodo
    public Cofrinho (String umNome, int umaIdade){
        dono = new Pessoa(umNome, umaIdade);
    }
    
    public void setDono (Pessoa novoDono){
        dono = novoDono;
    }
    
    public Pessoa getDono (){
        return dono;
    }
    
    public void depositarUmaMoedaCincoentaCentavos() {
        qt50 = qt50 +1;
    }
    
    public void depositarUmaMoedaDezCentavos(){
        qt10 = qt10 +1;
    }
    
    public void depositarUmaMoedaVinteCincoCentavos() {
        qt25 = qt25 +1;
    }
    
    public double calcularTotal (){
        double total;
        total = qt50 * 0.5 + qt25 * 0.25 + qt10 * 0.1;
        return total;
    }
    
    public String informaTotal(){
        return dono.getNome() + " tem um total de " + calcularTotal()+ "Reais";
    }
}