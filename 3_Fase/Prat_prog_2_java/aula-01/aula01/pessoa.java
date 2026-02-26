public class pessoa {
    //atributos
    private String nome;
    private int idade;

    //contronstrutor
    public pessoa(String nome, int idade) {
        this.setNome(nome);
        this.setIdade(idade);
    }

    //metodos
    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getNome() {
        return nome;
    }

    public void setIdade(int idade) {
        this.idade = idade;
    }

    public int getIdade() {
        return idade;
    }

    public void fazAniversario(){
        idade = idade + 1;
    }
    
    public void exibeDados(){
        System.out.println ("Nome: " + getNome());
        System.out.println ("Idade: "+ getIdade());
    }
}