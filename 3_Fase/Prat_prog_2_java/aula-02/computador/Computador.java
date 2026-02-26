public class Computador {
    private String marca;
    private String modelo;
    private int memoriaRAMGB;
    
    //construtor
    public Computador(String marca, String modelo, int memoriaRAMGB){
        this.marca = marca;
        this.modelo = modelo;
        this.memoriaRAMGB = memoriaRAMGB;
    }
    
    //getters e setters
    public String getMarca(){
        return marca;
    }
    
    public void setMarca(String marca) {
        this.marca = marca;
    }
    
    public String getModelo() {
        return modelo;
    }
    
    public void setModelo(String modelo) {
        this.modelo = modelo;
    }
    
    public int getMemoriaRAMGB(){
        return memoriaRAMGB;
    }
    
    public void setMemoriaRAMGB(int memoriaRAMGB) {
        this.memoriaRAMGB = memoriaRAMGB;
    }
    
    // metodo para exibir dados
    public void exibeDados(){
        System.out.println("Marca: " + marca);
        System.out.println("Modelo: " + modelo);
        System.out.println("Memória RAM: "+ memoriaRAMGB + "GB");
    }
}
