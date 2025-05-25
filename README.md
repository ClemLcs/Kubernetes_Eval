# GESTION PRODUITS

## Prérequis
 * `Cluster Kubernetes fonctionnel`
 * `kubectl installé : Outil en ligne de commande pour interagir avec Kubernetes. 
 * `Helm installé` : Gestionnaire de packages pour Kubernetes.
 * `Certifcat TLS valide` pour l'ingress controller
 * `Accès aux repository Docker Hub` [cpxlcs/kubernetes-eval](https://hub.docker.com/repository/docker/cpxlcs/kubernetes-eval/general)

## Déploiement de l'application
Utilisez la commande suivante pour déployer l'application :
```bash
helm install gestion-des-produits ./ -f values.yaml --namespace kubernetes-eval --create-namespace
```

Pour mettre à jour l'application :

```bash
helm upgrade gestion-des-produits ./ -f values.yaml -n  kubernetes-eval --create-namespace
```

Pour désinstaller l'application :
```bash
helm uninstall gestion-des-produits -n kubernetes-eval
```
# Vérification du déploiement

Vérifier que les pods sont en cours d'exécution :

```bash
kubectl get pods -n kubernetes-eval
```

Vérifier les services exposés :
```bash
kubectl get svc -n kubernetes-eval
```

Vérifier les ressources Ingress :
```bash
kubectl get ingress -n kubernetes-eval
```
Connectez vous à l'application avec l'url adaptée avec les informations suivantes :
- Login : `admin`
- Mot de passe : `password`

## Fonctionnalités
L'application permet de :
- Lister les produits
- Afficher la fiche produit en lecture seule
- Ajouter des produits
- Modifier les produits
- Supprimer les produits
- Pour chaque produit, il est possible d'ajouter autant de photos que nécessaire
