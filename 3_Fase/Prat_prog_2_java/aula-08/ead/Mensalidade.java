public class Mensalidade {
    private double valor;
    private boolean pago;

    public Mensalidade(double valor) {
        this.valor = valor;
        this.pago = false; // Por padrão, a mensalidade nasce pendente
    }

    public double getValor() { return valor; }
    public void setValor(double valor) { this.valor = valor; }

    public boolean isPago() { return pago; }

    // Método para marcar como pago
    public void darBaixa() {
        this.pago = true;
    }
}