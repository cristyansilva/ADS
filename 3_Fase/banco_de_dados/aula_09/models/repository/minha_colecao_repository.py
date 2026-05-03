from typing import Dict

# ## Seu Nome Completo Aqui
class MinhaColecaoRepository:
    def __init__(self, db_connection) -> None:
        self.__collection = db_connection.get_collection("minha_colecao")

    def insert_document(self, document: Dict) -> None:
        self.__collection.insert_one(document)
        print("Documento inserido com sucesso!")

    def update_document(self, filtro: Dict, novas_informacoes: Dict) -> None:
        # Uso do update_one com o operador $set
        resultado = self.__collection.update_one(
            filtro, 
            { "$set": novas_informacoes }
        )
        print(f"Documentos modificados: {resultado.modified_count}")

    def delete_document(self, filtro: Dict) -> None:
        # Uso do delete_one
        resultado = self.__collection.delete_one(filtro)
        print(f"Documentos deletados: {resultado.deleted_count}")