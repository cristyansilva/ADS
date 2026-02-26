public class Aluguel {
    private int codigo; 
    private String dataInicio; 
    private String dataFim;
    private Imovel imovel; 
    private Cliente cliente; 

    // Construtor
    public Aluguel(int codigo, String dataInicio, String dataFim, Imovel imovel, Cliente cliente) {
        this.codigo = codigo;
        this.dataInicio = dataInicio;
        this.dataFim = dataFim;
        this.imovel = imovel;
        this.cliente = cliente;
    }

    // metodo para exibir dados completos do aluguel
    public void exibeDados() { 
        System.out.println("Aluguel: " + codigo);
        System.out.println("Data Inicio: " + dataInicio); 
        System.out.println("Data Fim: " + dataFim); 
        imovel.exibeDados(); //método da classe imovel 
        System.out.println("Nome Cliente: " + cliente.getNome()); 
    }
}