public class Imovel {
    private String tipo;
    private double area;
    private int quartos;
    
    //construtor
    public Imovel(String tipo, double area, int quartos) {
        this.tipo = tipo;
        this.area = area;
        this.quartos = quartos;
    }
    
    //getters e settters
    public String getTipo() {
        return tipo;
    }
    
    public void setTipo(String tipo) {
        this.tipo = tipo;
    }
    
    public double getArea() {
        return area;
    }
    
    public void setArea(double area) {
        this.area = area;
    }
    
    public int getQuartos() {
        return quartos;
    }
    
    public void setQuartos(int quartos) {
        this.quartos = quartos;
    }
    
    //metodo para exibir dados
    
    public void exibeDados(){
        System.out.println("Tipo: " + tipo);
        System.out.println("Área: " + area + "m²");
        System.out.println("Quartos: " + quartos);
    }
}