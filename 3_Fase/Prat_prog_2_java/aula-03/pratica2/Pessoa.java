public class Pessoa {
    //atributos
    private String nome;
    private int idade;

    //contronstrutor
    public Pessoa(String nome, int idade) {
        nome = nome;
        idade = idade;
    }

    //metodos
    public void setNome(String novoNome) {
        nome = novoNome;
    }

    public String getNome() {
        return nome;
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
