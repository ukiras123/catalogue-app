#!/bin/bash

# Load environment variables from .env file
export $(grep -v '^#' .env | xargs)

# Deploy to Cloud Run
gcloud run deploy catalogue-app --source .\
  --set-env-vars $(grep -v '^#' .env | xargs | sed 's/ /,/g')
