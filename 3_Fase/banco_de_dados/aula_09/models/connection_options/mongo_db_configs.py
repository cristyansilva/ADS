import os
from dotenv import load_dotenv

load_dotenv()

# ## Cristyan das Neves Silva
mongo_db_infos = {
    "MONGO_URI": os.getenv("MONGO_URI"),
    "DATABASE_NAME": "db_cristyan_silva"  
}