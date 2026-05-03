## Cristyan

import sys
import os

sys.path.append(os.path.abspath(os.path.join(os.path.dirname(__file__), '..')))

from config.database import DatabaseManager
from models.projeto import Projeto

def main():
    print("--- Sistema de Gerenciamento de Projetos ---")
    
    db_manager = DatabaseManager()
    client = db_manager.get_client()

    if client:
        try:
            databases = client.list_database_names()
            
            print("\n✅ Sucesso! Conexão estabelecida com o MongoDB.")
            print(f"📁 Bancos de dados disponíveis: {databases}\n")

            novo_projeto = Projeto(nome="Atividade 05", descricao="Arquitetura profissional MongoDB")
            print(f"Modelo gerado e pronto para envio: {novo_projeto.to_dict()}\n")

        except Exception as e:
            print(f"❌ Erro ao tentar listar os bancos: {e}")
        finally:
            db_manager.close_connection()
    else:
        print("❌ Falha crítica: Não foi possível obter a conexão.")

if __name__ == "__main__":
    main()