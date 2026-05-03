from datetime import datetime

class Projeto:
    def __init__(self, nome, descricao, status="Pendente", data_cadastro=None):
        """
        Método construtor para inicializar os atributos do projeto.
        """
        self.nome = nome
        self.descricao = descricao
        self.status = status
        self.data_cadastro = data_cadastro if data_cadastro else datetime.now()

    def to_dict(self):
        """
        Converte o objeto para um dicionário Python.
        Isso é essencial pois o PyMongo aceita dicionários para inserir no banco.
        """
        return {
            "nome": self.nome,
            "descricao": self.descricao,
            "status": self.status,
            "data_cadastro": self.data_cadastro
        }