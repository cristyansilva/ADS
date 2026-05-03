import os
from dotenv import load_dotenv

load_dotenv()


mongo_db_infos = {
    "HOST": os.getenv("MONGO_URI", "mongodb://localhost:27017/"),
    "DB_NAME": "db_cristyan_silva" 
}