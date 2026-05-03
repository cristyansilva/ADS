# ## Cristyan das Neves Silva
from models.connection_options.connection import DBConnectionHandler
from models.repository.projetos_repository import ProjetosRepository

def main():
    # 1. Estabelecer Conexão
    db_handler = DBConnectionHandler()
    db_handler.connect_to_db()
    db_connection = db_handler.get_db_connection()

    # 2. Instanciar Repository
    repo = ProjetosRepository(db_connection)

    
    meus_dados = [
        {"Cardápio digital": "primeiro projeto", "autor": "Cristyan Silva", "matricula": 123, "tecnologia": "php", "horas": 40},
        {"sistema de gestão": "ERP", "autor": "Cristyan Neves", "matricula": 1234, "tecnologia": "laravel", "horas": 25},
        {"performance analyzer": "projeto saude", "autor": "Cristyan das Neves", "matricula": 12345, "tecnologia": "Python", "horas": 15},
        {"Projeto Integrador": "FMP", "autor": "Cristyan", "matricula": 123456, "tecnologia": "Java", "horas": 60}
    ]
    
    db_connection.get_collection("projetos").delete_many({}) 
    repo.insert_many(meus_dados)
    print("--- Dados inseridos com sucesso ---\n")

    # [PRINT 4] - Consultas com Find() e Filtros Básicos
    print("=== BUSCA COM FILTRO (Tecnologia: Python) ===")
    resultados_python = repo.find_with_filter({"tecnologia": "Python"})
    for doc in resultados_python:
        print(doc)
    print("\n")

    print("=== BUSCA COM PROJEÇÃO (Apenas nome_projeto e horas) ===")
    # 0 = exclui o campo, 1 = inclui o campo
    resultados_proj = repo.find_with_projection({"autor": "Cristyan Silva"}, {"_id": 0, "Cardápio digital": 1, "horas": 1})
    for doc in resultados_proj:
        print(doc)
    print("\n")

    # [PRINT 5] - Ordenação e Paginação
    print("=== BUSCA COM ORDENAÇÃO E PAGINAÇÃO ===")
    # Filtro vazio ({}), Ordena por 'horas' DESC (-1), Pula 1 (skip=1), Limita a 2 (limit=2)
    resultados_paginados = repo.find_with_sort_and_pagination({}, "horas", -1, 1, 2)
    for doc in resultados_paginados:
        print(doc)
    print("\n")

if __name__ == "__main__":
    main()  