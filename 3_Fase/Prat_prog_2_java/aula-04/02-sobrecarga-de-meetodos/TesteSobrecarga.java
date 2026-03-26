public class TesteSobrecarga{
    public static void main (String[] args) {
        MinhaCalculadora calc = new MinhaCalculadora();
        
        int resultado1 = calc.soma(1,2);
        int resultado2 = calc.soma(1,2,3);
        double resultado3 = calc.soma(1.5, 2.5);
        
        System.out.println("Resultado 1: " + resultado1);
        System.out.println("Resultado 2: " + resultado2);
        System.out.println("Resultado 3: " + resultado3);
    }
}