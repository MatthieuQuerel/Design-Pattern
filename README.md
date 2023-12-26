﻿# Réponses aux questions
﻿#﻿# Design pattern
﻿#﻿#﻿# Diagrame 
﻿#﻿#﻿## Lancement 
﻿#﻿﻿#﻿### Source
#﻿﻿#### Imprésion
﻿# Réponses aux questions
1.	Quel(s) avantage(s) procure le fait de programmer vers une interface et non vers une implémentation ? Vous pouvez illustrer votre réponse avec un code source minimal et/ou avec un diagramme.

-	Programmer vers une interface procure une flexibilité et une maintenance et de mieux gérer les dépendances, cela permet également de se concentrer sur une class.

-	Ce dessous un exemple de code source qui permet une flexibilité et une maintenance plutôt stable avec la partie de récupération de la  fonction dans interface et de l’exécuter dans les 2 class
2.	<?php
3.	
4.	// Interface
5.	interface Formatter {
6.	    public function formatData($data);
7.	}
8.	
9.	// Implémentation JSONFormatter
10.	class JSONFormatter implements Formatter {
11.	    public function formatData($data) {
12.	        // Implémentation pour formater en JSON
13.	        return json_encode(['data' => $data]);
14.	    }
15.	}
16.	
17.	// Implémentation CSVFormatter
18.	class CSVFormatter implements Formatter {
19.	    public function formatData($data) {
20.	        // Implémentation pour formater en CSV
21.	        return "key, value\n" . $data;
22.	    }
23.	}
24.	
25.	// Utilisation dans le code client
26.	// Utilisation avec JSONFormatter
27.	$jsonFormatter = new JSONFormatter();
28.	$jsonData = $jsonFormatter->formatData("some data");
29.	echo "JSON Data: " . $jsonData . PHP_EOL;
30.	
31.	// Utilisation avec CSVFormatter
32.	$csvFormatter = new CSVFormatter();
33.	$csvData = $csvFormatter->formatData("some data");
34.	echo "CSV Data: " . $csvData . PHP_EOL;
35.	?>


2. Pourquoi, de manière générale, vaut-il mieux préférerla composition à l’héritage ? Vous pouvez illustrer votre réponse avec un code source minimal et/ou avec un diagramme.
La composition est préférable à l’héritage pour plusieurs raisons : 
-elle permet assembler des fonctionnalités à la volée
- D’améliorer la flexibilité 
- elle réduit le couplage fort entre les class 
- elle permet de réutiliser les composants individuels de façon sélective
En revancehe, l’héritage créer une relation fixe entre les class.
Cet exemple on peut retrouver une composition entre la class public ‘Engine ‘ et class public ‘Car ‘

// Classe Moteur
public class Engine {
    public void start() {
        System.out.println("Engine started");
    }
}

// Classe Voiture utilisant la composition
public class Car {
    private Engine engine;

    public Car(Engine engine) {
        this.engine = engine;
    }

    public void start() {
        System.out.println("Car starting...");
        engine.start();
    }
}

// Utilisation dans le code client
public class Main {
    public static void main(String[] args) {
        Engine carEngine = new Engine();
        Car myCar = new Car(carEngine);

        myCar.start(); // La méthode start() de la voiture utilise le moteur via la composition.
    }

    
3. En programmation orienté objet, qu’est-ce qu’une interface ? Remarque : on ne parle pasici du construct PHPinterface.
Une interface est un ensemble de méthodes abtraites qui n’a pas de corps et qui doit être implémentées par des class. Une interface definit un contrat que les class doivent respecter et présiser les méthodes que les class doivent fournir


﻿#﻿#Design pattern
 Contexte:

Imaginons une application qui permet aux utilisateurs de générer des nombres aléatoires, des mots aléatoires et des couleurs aléatoires. Cette application permet aux utilisateurs de choisir les types de données qu'ils souhaitent générer et de spécifier le nombre de résultats qu'ils souhaitent obtenir.

Situation initiale:

Dans la situation initiale, chaque utilisateur doit accéder directement à l'application pour utiliser les données fournie par le code  qu'ils souhaitent. Cela peut être peu pratique, car cela oblige chaque utilisateur à connaître les commandes de l'application.

Problème à résoudre:

Le problème à résoudre est de simplifier la génération de données aléatoires pour les utilisateurs. Cela peut être fait en utilisant un médiateur pour gérer les interactions.

Solution:

Le design pattern médiateur peut être utilisé pour résoudre ce problème en introduisant un médiateur entre les utilisateurs et l'application. Le médiateur est responsable de la génération des données aléatoires et de la distribution des données aux utilisateurs. Les utilisateurs peuvent interagir avec le médiateur pour générer les données qu'ils souhaitent.

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Avantages du patron médiateur

Réduction du couplage entre les objets : le médiateur permet de faire communiquer les objets indirectement, via l'objet médiateur. Cela réduit le nombre de dépendances entre les objets, ce qui facilite leur modification, leur extension et leur réutilisation.
Amélioration de la testabilité : le fait que les objets communiquent indirectement via le médiateur facilite les tests unitaires des objets.
Facilité d'ajout de nouvelles fonctionnalités : le médiateur centralise les interactions entre les objets, ce qui facilite l'ajout de nouvelles fonctionnalités au système.

Inconvénients du patron médiateur

Complexité accrue : le médiateur ajoute une couche de complexité au système.
Risque de couplage avec le médiateur : si le médiateur est mal conçu, il peut entraîner un couplage élevé entre les objets.
Exemples d'utilisation du patron médiateur


Info :
Le patron médiateur est souvent utilisé dans les systèmes où les objets ont des interactions complexes et dynamiques. Par exemple, le patron médiateur peut être utilisé dans les systèmes suivants :

Interface utilisateur graphique : le médiateur peut être utilisé pour gérer les interactions entre les différents composants de l'interface utilisateur.
Applications multi-utilisateurs : le médiateur peut être utilisé pour gérer les interactions entre les différents utilisateurs d'une application.
Systèmes distribués : le médiateur peut être utilisé pour gérer les interactions entre les différents nœuds d'un système distribué.

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
﻿#﻿#﻿# Diagrame 
 +-------------------+        +---------------------+        +------------------+
|   IMediator       |        |  AbstractMediator   |        |  ConcreteMediator|
+-------------------+        +---------------------+        +------------------+
| + addClient()     |        | - clients: array    |        |+notifyClients    |
| + getRandomNumber()|<>-----| + addClient()       |        |                  |
| + getRandomWord()  |       | + getRandomNumber() |        |                  |
| + getRandomColor() |       | + getRandomWord()   |        |                  |
| + notifyClients()  |       | + getRandomColor()  |        |                  |
+-------------------+        | + notifyClients()   |        |                  |
                             +---------------------+        +------------------+
                                        |
                                        |
                             +----------|------------+
                             |                       |
                    +------------------+    +---------------------+
                    |     IClient      |    |      Client         |
                    +------------------+    +---------------------+
                    | + onRandomNumber()|    |- mediator: IMediator|
                    |+ onRandomWord()   |    | + onRandomNumber()  |
                    |  + onRandomColor()|    | + onRandomWord()    |
                    |                   |    | + onRandomColor()   |
                    |                   |      +------------------+
                    +------------------+
﻿#﻿#﻿## Lancement
1 ) dans un premier temps l'utilisateur dois ou non change l'écart entre la génération de chiffre (public function getRandomNumber() {)
2) aussi  l'utilisateur dois ou non  change les mots de le fonction(public function getRandomWord() { et public function getRandomColor() {) 
3) dans le terminale du code faire un php Mediateur.PHP

﻿#﻿#﻿#﻿##﻿Source 
 https://refactoring.guru/fr/design-patterns
 https://fr.wikipedia.org/wiki/Patron_de_conception
 https://www.adimeo.com/blog-technique/design-patterns-a-quoi-ca-sert-et-comment-les-utiliser
 livre =>Architecture logicielle propre
#﻿﻿###﻿﻿## ﻿#Imprésion
je trouve que cela a étez une bonne expériance riche en aprentisage qui aport un nouveau point de vue sur mon développement web ou même embarqué