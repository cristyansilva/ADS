public class TesteCarro{
    public static void main(String[] args){
        Carro carro = new Carro();

        carro.setMarca("Toyota");
        carro.setModelo("Corola");
        carro.setNumPassageiros(5);
        carro.setCapCombustivel(50.0);
        carro.setConsumoCombustivel(12.5);

        System.out.println("marca: " + carro.getMarca());
        System.out.println("Modelo: " + carro.getModelo());
        System.out.println("Numero de passageiros: " + carro.getNumPassageiros());
        System.out.println("Capacidade do combst: " + carro.getCapCombustivel());
        System.out.println("consumo: " + carro.getConsumoCombustivel());
    }
}