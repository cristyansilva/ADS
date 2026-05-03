from datetime import datetime

class Projeto:
    def __init__(self, nome, descricao, status, tecnologias, data_cadastro=None):
        self.nome = nome
        self.descricao = descricao
        self.status = status
        self.tecnologias = tecnologias
        self.data_cadastro = data_cadastro or datetime.now()

    def validate(self):
        # Validação de campos obrigatórios e tipos
        if not self.nome or not isinstance(self.nome, str):
            print("Erro de validação: 'nome' é obrigatório e deve ser um texto válido.")
            return False
        if not self.descricao or not isinstance(self.descricao, str):
            print("Erro de validação: 'descricao' é obrigatória.")
            return False
        if not isinstance(self.tecnologias, list):
            print("Erro de validação: 'tecnologias' deve ser uma lista (ex: ['Python', 'MongoDB']).")
            return False
        return True

    def to_dict(self):
        return {
            "nome": self.nome,
            "descricao": self.descricao,
            "status": self.status,
            "tecnologias": self.tecnologias,
            "data_cadastro": self.data_cadastro
        }