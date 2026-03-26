public class Pessoa{
    private String nome;
    private Data dataNascimento;
    
    //constutor da classe pessoa
    public Pessoa(String nome, Data dataNascimento){
        this.nome = nome;
        this.dataNascimento = dataNascimento;
    }
    
    //metodos getters e setters para acessar e modificar os atributos 
    public String getNome(){
        return nome;
    }
    
    public void setNome(String nome){
        this.nome = nome;
    }
    
    public Data getDataNascimento() {
        return dataNascimento;
    }
    
    public void setDataNascimento(Data dataNascimento) {
        this.dataNascimento = dataNascimento;
    }
    
    public void exibeInformacoes() {
        System.out.println("Nome: " + nome);
        System.out.println("Data de Nascimento: ");
        dataNascimento.exibirData();
    }
}