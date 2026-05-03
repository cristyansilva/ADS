from pymongo import MongoClient
from datetime import datetime

client = MongoClient("mongodb://localhost:27017/")

try:
    dbs = client.list_database_names()

    db = client["aula04"]

    colecao = db["alunos"]

    colecao.delete_many({})

    dados = [
        {
            "nome": "Ana",
            "categoria": "TI",
            "nota": 9.5,
            "ativo": True,
            "data_cadastro": datetime.now()
        },
        {
            "nome": "Bruno",
            "categoria": "Engenharia",
            "nota": 8.7,
            "ativo": True,
            "data_cadastro": datetime.now()
        },
        {
            "nome": "Carlos",
            "categoria": "Administração",
            "nota": 7.8,
            "ativo": False,
            "data_cadastro": datetime.now()
        },
        {
            "nome": "Daniela",
            "categoria": "TI",
            "nota": 9.2,
            "ativo": True,
            "data_cadastro": datetime.now()
        },
        {
            "nome": "Eduardo",
            "categoria": "Design",
            "nota": 8.0,
            "ativo": True,
            "data_cadastro": datetime.now()
        }
    ]

    resultado = colecao.insert_many(dados)

    print(" Registros cadastrados: ")

    for doc in colecao.find():
        print(doc)

except Exception as e:
    print(" Erro:", e)