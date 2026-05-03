from models.connection_options.connection import db_connection_handler
from models.repository.minha_colecao_repository import MinhaColecaoRepository

# ## Cristyan das Neves Silva 3F

# 1. Conexão
db_connection_handler.connect_to_db()
db_conn = db_connection_handler.get_db_connection()

# 2. Instanciar Repository
repository = MinhaColecaoRepository(db_conn)

# 3. Dados Personalizados 
meu_documento = {
    "nome": "Cristyan das Neves Silva",
    "matricula": 12345,
    "projeto": "projeto_aula_09",
    "status": "pendente"
}

print("\n--- Iniciando Testes ---")

# Inserção Inicial
repository.insert_document(meu_documento)

# # Operação de UPDATE
# print("\nExecutando Update...")
# repository.update_document(
#     {"matricula": 12345}, 
#     {"status": "concluido", "nota_esperada": 0.5}
# )

# Operação de DELETE
print("\nExecutando Delete...")
repository.delete_document({"projeto": "projeto_aula_09"})

print("\n--- Testes Finalizados ---")