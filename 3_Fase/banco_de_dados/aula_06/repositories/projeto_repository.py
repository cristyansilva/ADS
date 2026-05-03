from pymongo import InsertOne

class ProjetoRepository:
    def __init__(self, db):
        self.collection = db["projetos"]

    def insert_one(self, projeto):
        if not projeto.validate():
            raise ValueError("Falha na validação do projeto.")
        resultado = self.collection.insert_one(projeto.to_dict())
        return resultado.inserted_id

    def insert_many(self, projetos):
        documentos_validos = []
        for p in projetos:
            if p.validate():
                documentos_validos.append(p.to_dict())
            else:
                print(f"Aviso: Projeto '{p.nome}' ignorado por falha na validação.")
        
        if not documentos_validos:
            raise ValueError("Nenhum projeto válido fornecido para inserção.")

        resultado = self.collection.insert_many(documentos_validos)
        return resultado.inserted_ids

    def insert_bulk(self, operacoes):
        """
        Recebe uma lista de operações do PyMongo (ex: InsertOne, UpdateOne, DeleteOne)
        e as executa em uma única requisição ao banco.
        """
        if not operacoes:
            return None
        
        resultado = self.collection.bulk_write(operacoes)
        return resultado