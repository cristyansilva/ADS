public class Teste10 {
    public static String compararIdades(Pessoa p1, Pessoa p2) {
        if (p1.getIdade() > p2.getIdade()) { 
            return p1.getNome(); 
        } else if (p1.getIdade() < p2.getIdade()) { 
            return p2.getNome(); 
        } else {
            return "As pessoas tem a mesma idade";
        }
    }
}