public class TesteSobrecargaConstrutor{
    public static void main (String[] args){
        Carro carro1 = new Carro ("Marca1", "Modelo1", 4, 60.0, 15.0);
        Carro carro2 = new Carro ();
        Carro carro3 = new Carro ("Marca2", "Modelo2", 5);
        Carro carro4 = new Carro ("Marca3", "Modelo3");
    }
}