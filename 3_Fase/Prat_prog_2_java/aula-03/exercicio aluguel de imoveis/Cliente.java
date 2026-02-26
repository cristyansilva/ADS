public class Cliente {
    private int codigo; 
    private String nome; 
    private String telefone; 

    // construtor
    public Cliente(int codigo, String nome, String telefone) { 
        this.codigo = codigo;
        this.nome = nome;
        this.telefone = telefone;
    }

    // metodos Get
    public String getNome() { 
        return nome;
    }

    public String getTelefone() {
        return telefone;
    }
}