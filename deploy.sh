#!/bin/bash

# -------------------------------------
# Script de déploiement par RSYNC
# -------------------------------------

SRC="/home/jopi/ISE/webapps/ise_v2/"
DEST_USER="mon_user"
DEST_HOST="mon_server"
DEST_PATH="cmvwzrrq@node68-eu.n0c.com:/home/cmvwzrrq/ise"
SSH_PORT=5022

echo "🚀 Déploiement en cours…"

rsync -avz \
  -e "ssh -p $SSH_PORT" \
  --exclude '_notes' \
  --exclude 'var' \
  --exclude 'vendor' \
  --exclude '.env' \
  --exclude '.git' \
  --exclude '.editorconfig' \
  "$SRC" \
  "$DEST_USER@$DEST_HOST:$DEST_PATH"

echo "✅ Déploiement terminé."
