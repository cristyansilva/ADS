public class PrimeiroExemploHeranca{
    public static void main(String args[]){
       /* Usuario usuario = new Usuario( Teclado.leInt("Informe a matricula do usuario: "),
                                    Teclado.leString("Informe o nome do usuario: "),
                                    Teclado.leString("Informe o login do usuario: "),
                                    Teclado.leString("Informe a senha do usuario: ")
                                    );
*/    
        Professor professor = new Professor( Teclado.leInt("Informe a matricula do professor: "),
                                    Teclado.leString("Informe o nome do professor: "),
                                    Teclado.leString("Informe o login do professor: "),
                                    Teclado.leString("Informe a senha do professor: ")
                                    );
        
        Aluno aluno = new Aluno ( Teclado.leInt("Informe a matricula do aluno: "),
                                    Teclado.leString("Informe o nome do aluno: "),
                                    Teclado.leString("Informe o login do aluno: "),
                                    Teclado.leString("Informe a senha do aluno: ")
                                    );
                                    
       /*  //usuario                           
        System.out.println("");
        System.out.println("Matricula do usuario: " + usuario.getMatricula()); 
        System.out.println("Nome do usuario: " + usuario.getNome()); */
        
        //professor
        System.out.println("");
        System.out.println("Matricula do professor: " + professor.getMatricula()); 
        System.out.println("Nome do professor: " + professor.getNome()); 

        
        //aluno
        System.out.println("");
        System.out.println("Matricula do aluno: " + aluno.getMatricula()); 
        System.out.println("Nome do aluno: " + aluno.getNome()); 
    }
}