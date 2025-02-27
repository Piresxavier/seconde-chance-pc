#!/bin/bash

# Vérifie l'état du dépôt Git
echo "Vérification de l'état du dépôt..."
git status

# Ajoute tous les fichiers modifiés à l'index
echo "Ajout des fichiers modifiés..."
git add .

# Effectue un commit avec le message "upgrade phone"
echo "Commit des modifications..."
git commit -m "upgrade phone"

# Pousse les modifications vers la branche main du dépôt distant
echo "Poussée des modifications vers le dépôt distant..."
git push origin main

echo "Script terminé."
