import sys
import os

caminho_raiz = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
sys.path.append(caminho_raiz)

from config.database import DatabaseManager
from models.projeto import Projeto
from repositories.projeto_repository import ProjetoRepository

##  Nome: Cristyan das Neves Silva
def main():
    db_manager = DatabaseManager()
    db = db_manager.get_db()
    repository = ProjetoRepository(db)

    print("\n--- 1. Testando Validação Proposital (Print 3) ---")
    projeto_invalido = Projeto(nome="", descricao="Projeto com erro", status="ativo", tecnologias="Python")
    projeto_invalido.validate()

    print("\n--- 2. Preparando 10 Projetos ---")
    projetos_para_inserir = []
    for i in range(1, 11):
        p = Projeto(
            nome=f"Sistema Integrado v{i}.0",
            descricao=f"Descrição detalhada do escopo do projeto {i}.",
            status="Em Andamento",
            tecnologias=["Python", "PyMongo", "Docker"]
        )
        projetos_para_inserir.append(p)

    print("\n--- 3. Executando Inserção em Massa (Print 2) ---")
    try:
        ids_inseridos = repository.insert_many(projetos_para_inserir)
        print(f"{len(ids_inseridos)} documentos inseridos com sucesso!")
        print("IDs retornados (ObjectIds):")
        for _id in ids_inseridos:
            print(f" -> {_id}")
    except Exception as e:
        print(f"Erro durante a inserção em massa: {e}")

if __name__ == "__main__":
    main()