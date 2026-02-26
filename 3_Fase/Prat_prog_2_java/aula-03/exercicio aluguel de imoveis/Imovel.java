public class Imovel {
    private int codigo; 
    private String descricao;
    private double precoAluguel;
    private int qtMinMeses;

    // Construtor
    public Imovel(int codigo, String descricao, double precoAluguel, int qtMinMeses) {         this.codigo = codigo;
        this.descricao = descricao;
        this.precoAluguel = precoAluguel;
        this.qtMinMeses = qtMinMeses;
    }

    // Metodo para exibir dados do imóvel
    public void exibeDados() { 
        System.out.println("Dados do Imovel");
        System.out.println("Codigo: " + codigo); 
        System.out.println("Descricao: " + descricao); 
        System.out.println("Preco do Aluguel: " + precoAluguel);
        System.out.println("Qtde. Min. Meses: " + qtMinMeses); 
    }
}
