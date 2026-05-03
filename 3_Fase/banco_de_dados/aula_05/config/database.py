import os
from pymongo import MongoClient
from dotenv import load_dotenv
from pymongo.errors import ConnectionFailure

load_dotenv()

class DatabaseManager:
    def __init__(self):
        self._uri = os.getenv("MONGODB_URI")
        self._client = None

    def get_client(self):
        try:
            if self._client is None:
                self._client = MongoClient(self._uri, serverSelectionTimeoutMS=5000)
                self._client.admin.command('ping')
                
            return self._client
        except ConnectionFailure:
            print("❌ Erro: Não foi possível conectar ao MongoDB. Verifique sua URI ou conexão.")
            return None
        except Exception as e:
            print(f"❌ Ocorreu um erro inesperado: {e}")
            return None

    def close_connection(self):
        if self._client:
            self._client.close()
            print("🔌 Conexão com o banco de dados fechada.")