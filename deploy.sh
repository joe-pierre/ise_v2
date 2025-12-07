#!/bin/bash

# -------------------------------------
# Script de déploiement par RSYNC
# -------------------------------------

SRC="/home/jopi/ISE/webapps/ise_v2"
DEST_USER="cmvwzrrq"
DEST_HOST="node68-eu.n0c.com"
DEST_PATH="/home/cmvwzrrq/ise"
SSH_PORT=5022
PASSWORD="Hh5RAUpVcySw2g"

echo "🚀 Déploiement en cours ..."

sshpass -p "$PASSWORD" rsync -avz \
  -e "ssh -p $SSH_PORT" \
  --exclude '_notes' \
  --exclude 'var' \
  --exclude 'vendor' \
  --exclude '.env' \
  --exclude '.git' \
  --exclude '.editorconfig' \
  --exclude 'deploy.sh' \
  --exclude 'z_newsp_connect.sh' \
  "$SRC" \
  "$DEST_USER@$DEST_HOST:$DEST_PATH"

echo "✅ Déploiement terminé."
