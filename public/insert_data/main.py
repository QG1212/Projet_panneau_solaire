import csv
import unicodedata
import re

# === Fonctions ===

# Corrige les caractères mal encodés (ex: Ã© -> é)
def fix_encoding(text):
    try:
        return text.encode('latin1').decode('utf-8')
    except:
        return text

# Nettoie les noms de colonnes pour être valides en SQL
def normalize_column(name):
    name = fix_encoding(name)
    name = unicodedata.normalize('NFKD', name).encode('ASCII', 'ignore').decode('utf-8')
    name = re.sub(r'\W+', '_', name)
    return name.lower().strip('_')

# === Configuration ===
csv_file_path = 'data.csv'
output_file = 'data_2024.csv'

# === Lecture du CSV ===
with open(csv_file_path, newline='', encoding='utf-8') as csvfile:
    reader = csv.reader(csvfile)
    raw_headers = next(reader)

    # Correction et normalisation des colonnes
    fixed_headers = [fix_encoding(h) for h in raw_headers]
    normalized_headers = [normalize_column(h) for h in fixed_headers]


    # Génération des INSERTs
    insert_statements = []
    for row in reader:
        fixed_row = [fix_encoding(val).replace("'", "''") for val in row]
        values = ', '.join([f'{val}' for val in fixed_row])
        sql = f'{values};'
        insert_statements.append(sql)

# === Écriture dans le fichier SQL ===
with open(output_file, 'w', encoding='utf-8') as f:
    f.write('\n'.join(insert_statements))

print(f"✅ {len(insert_statements)} requêtes INSERT + CREATE TABLE générées dans '{output_file}'")
