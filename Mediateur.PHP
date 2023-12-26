<?php
interface IMediator {

    public function addClient(IClient $client);

    public function getRandomNumber();

    public function getRandomWord();

    public function getRandomColor();

    public function notifyClients(); 
}

interface IClient {

    public function onRandomNumber();

    public function onRandomWord();

    public function onRandomColor();
}

class AbstractMediator implements IMediator {

    private $clients = [];

    public function addClient(IClient $client) {
        $this->clients[] = $client;
    }

    public function getRandomNumber() {
        return rand(1, 100);
    }

    public function getRandomWord() {
        $words = ["hello", "world", "php", "javascript", "python"];
        return $words[array_rand($words)];
    }

    public function getRandomColor() {
        $colors = ["red", "green", "blue", "yellow", "purple"];
        return $colors[array_rand($colors)];
    }

    public function notifyClients() {
        foreach ($this->clients as $client) {
            $client->onRandomNumber();
            $client->onRandomWord();
            $client->onRandomColor();
        }
    }
}

class ConcreteMediator extends AbstractMediator {

    public function notifyClients() {
       parent::notifyClients(); 
    }
}

class Client implements IClient {

    private $mediator;

    public function __construct(IMediator $mediator) {
        $this->mediator = $mediator;
    }

    public function onRandomNumber() {
        echo "Un nombre aléatoire entre 1 et 100 : " . $this->mediator->getRandomNumber() . "\n";
    }

    public function onRandomWord() {
        echo "Un mot aléatoire : " . $this->mediator->getRandomWord() . "\n";
    }

    public function onRandomColor() {
        echo "Une couleur aléatoire : " . $this->mediator->getRandomColor() . "\n";
    }
}

$mediator = new ConcreteMediator();

$client1 = new Client($mediator);
$client2 = new Client($mediator);

$mediator->addClient($client1);
$mediator->addClient($client2);

$mediator->notifyClients();

// L'interface IMediator définit les méthodes que doivent implémenter les classes médiateurs.

// La méthode addClient() permet d'ajouter un nouveau client au médiateur.
// La méthode getRandomNumber() permet de générer un nombre aléatoire entre 1 et 100.
// La méthode getRandomWord() permet de générer un mot aléatoire à partir d'une liste de mots.
// La méthode getRandomColor() permet de générer une couleur aléatoire à partir d'une liste de couleurs.
// La méthode notifyClients() permet d'informer tous les clients du médiateur de nouveaux événements.
// L'interface IClient définit les méthodes que doivent implémenter les classes clients.

// La méthode onRandomNumber() est appelée lorsque le médiateur génère un nouveau nombre aléatoire.
// La méthode onRandomWord() est appelée lorsque le médiateur génère un nouveau mot aléatoire.
// La méthode onRandomColor() est appelée lorsque le médiateur génère une nouvelle couleur aléatoire.
// La classe ConcreteMediator implémente l'interface IMediator et fournit une implémentation par défaut des méthodes.

// La classe Client implémente l'interface IClient et fournit une implémentation par défaut des méthodes.

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Contexte:

// Imaginons une application qui permet aux utilisateurs de générer des nombres aléatoires, des mots aléatoires et des couleurs aléatoires. Cette application permet aux utilisateurs de choisir les types de données qu'ils souhaitent générer et de spécifier le nombre de résultats qu'ils souhaitent obtenir.

// Situation initiale:

// Dans la situation initiale, chaque utilisateur doit accéder directement à l'application pour utiliser les données fournie par le code  qu'ils souhaitent. Cela peut être peu pratique, car cela oblige chaque utilisateur à connaître les commandes de l'application.

// Problème à résoudre:

// Le problème à résoudre est de simplifier la génération de données aléatoires pour les utilisateurs. Cela peut être fait en utilisant un médiateur pour gérer les interactions.

// Solution:

// Le design pattern médiateur peut être utilisé pour résoudre ce problème en introduisant un médiateur entre les utilisateurs et l'application. Le médiateur est responsable de la génération des données aléatoires et de la distribution des données aux utilisateurs. Les utilisateurs peuvent interagir avec le médiateur pour générer les données qu'ils souhaitent.

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// Avantages du patron médiateur

// Réduction du couplage entre les objets : le médiateur permet de faire communiquer les objets indirectement, via l'objet médiateur. Cela réduit le nombre de dépendances entre les objets, ce qui facilite leur modification, leur extension et leur réutilisation.
// Amélioration de la testabilité : le fait que les objets communiquent indirectement via le médiateur facilite les tests unitaires des objets.
// Facilité d'ajout de nouvelles fonctionnalités : le médiateur centralise les interactions entre les objets, ce qui facilite l'ajout de nouvelles fonctionnalités au système.

// Inconvénients du patron médiateur

// Complexité accrue : le médiateur ajoute une couche de complexité au système.
// Risque de couplage avec le médiateur : si le médiateur est mal conçu, il peut entraîner un couplage élevé entre les objets.
// Exemples d'utilisation du patron médiateur


// Info :
// Le patron médiateur est souvent utilisé dans les systèmes où les objets ont des interactions complexes et dynamiques. Par exemple, le patron médiateur peut être utilisé dans les systèmes suivants :

// Interface utilisateur graphique : le médiateur peut être utilisé pour gérer les interactions entre les différents composants de l'interface utilisateur.
// Applications multi-utilisateurs : le médiateur peut être utilisé pour gérer les interactions entre les différents utilisateurs d'une application.
// Systèmes distribués : le médiateur peut être utilisé pour gérer les interactions entre les différents nœuds d'un système distribué.

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// 1 ) dans un premier temps l'utilisateur dois ou non change l'écart entre la génération de chiffre (public function getRandomNumber() {)
// 2) aussi  l'utilisateur dois ou on change les mots de le fonction(public function getRandomWord() { et public function getRandomColor() {)
// 3) dans le terminale du code faire un php Mediateur.PHP
     