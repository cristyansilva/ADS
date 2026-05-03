# ## Cristyan das Neves Silva
class ProjetosRepository:
    def __init__(self, db_connection) -> None:
        self.__collection_name = "projetos"
        self.__db_connection = db_connection

    def insert_many(self, documents: list) -> None:
        collection = self.__db_connection.get_collection(self.__collection_name)
        collection.insert_many(documents)

    def find_all(self):
        collection = self.__db_connection.get_collection(self.__collection_name)
        return list(collection.find())

    def find_with_filter(self, filter_query: dict):
        collection = self.__db_connection.get_collection(self.__collection_name)
        return list(collection.find(filter_query))

    def find_with_projection(self, filter_query: dict, projection: dict):
        collection = self.__db_connection.get_collection(self.__collection_name)
        return list(collection.find(filter_query, projection))

    def find_with_sort_and_pagination(self, filter_query: dict, sort_field: str, direction: int, skip: int, limit: int):
        collection = self.__db_connection.get_collection(self.__collection_name)
        # direction: 1 para Crescente (ASC), -1 para Decrescente (DESC)
        cursor = collection.find(filter_query).sort(sort_field, direction).skip(skip).limit(limit)
        return list(cursor)