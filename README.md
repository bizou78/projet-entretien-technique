# projet-entretien-technique
projet réalisé pour un entretien technique.

Création d'une Api avec le framework Symfony et d'une interface utilisateur en React
avec un environement Docker

## Installation

Pour installer ce projet, veuillez suivre ces étapes :

### Cloner le repo GIT

```bash
git clone https://github.com/bizou78/projet-entretien-technique.git
```

```bash
cd projet-entretien-technique
```

### Démarrer les conteneurs Docker
```bash
make start
```
### Initaliser le projet symfony
```bash
make first-install
```

## Etapes de developement

### Création de l'environnement Docker Symfony
Mise en place de l'environnement de developement Docker en commencant par la partie PHP Symfony.

Création du fichier docker-compose.yaml

Définitions des services Nginx, PHP 8 et Mysql

Création du Dockerfile PHP

Vérification du bon fonctionnement des conteneurs

### Developement de l'Api Symfony

Initialisation du projet avec le skeleton minimal de symfony.

Ajout de Doctrine pour gérer la base de données.
```bash
composer require doctrine
```
Création de la base de données.

Création de l'entité News.

Mise à jour du schéma de base de données.

Création de la commande permettant l'import des News depuis l'api de MediaStack.

Création de la factory NewsFactory permettant la création des objets News qui seront enregistrés en base de données.

Vérification du bon fonctionnement de la commande d'import des news gràce à la commande :
```bash
bin/console populate-news
```

Installation d'Api platform à l'aide de la commande :
```bash
composer require api
```

Définition de l'entité NEws comme une ressource ApiPlatform :
```php
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get']
)]
```

Vérification du fonctionnement de l'Api avec Insomnia / Postman

### Création de l'environnement Docker React
Création du dossier node et des fichiers Dockerfile et .dockerignore.

Mise à jour du fichier docker-compose.yaml.

Vérification du fonctionnement du conteneur.

### Developpement de la partie Front React

Initialisation du projet à l'aide de la commande :
```bash
npx create-react-app react-app
```

Création du fichier .env pour définir l'url de l'api Symfony.

Création du composant NewsList permettant l'affichage de la liste des news.

Modification du fichier App.js afin d'ajouter le routing
```js
function App() {
    return (
        <div className="App">
            <Router>
                <Routes>
                    <Route path="/news" element={<NewsList />} />
                    <Route path="/news/:id" element={<NewsDetails/>} />
                    <Route path="*" element={<Navigate to="/news" />} />
                </Routes>
            </Router>
        </div>
    );
}
```

Création du composant News définissant chaque news de la liste.

Création du service news.service.js permettant de réaliser les différents appels à l'api pour récupérer les données.

Création du composant NewsDetails définissant l'affichage d'une news dans le détail.

Ajout du package sass avec la commande :
```bash
npm install sass
```

Ajout d'un peu de style avec les fichiers scss.

## Ameliorations possibles

### Api Symfony
Sécurisation de l'Api via Token.

Sécurisation de l'api avec les cors.

Ajout de test.

Ajouter la possibilité d'importer des News depuis plusieurs Api.

### Front React
Ajout de test.

Améliorer l'UX/UI

Ajouter un formulaire pour créer une News.

Rendre l'application responsive.

Ajouter un système de pagination.


##Difficultées rencontrées

Mise en place du conteneur Docker React.

Changement du Router React version 6.

Remplacement du hook useHistory par useNavigate.