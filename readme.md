# Correction du TP PHP/POO/MVC Avancé


# IMPORTANT

## TP d'origine :  https://gist.github.com/tomsihap/0e10bd34ed1cb8ba1366866849e3da96

## PROJET DE BASE POUR TRAVAILLER + CODE A RAJOUTER LORS DU DEVELOPPEMENT :  https://github.com/tomsihap/mvc-avance-base

## Sommaire

- [Correction du TP PHP/POO/MVC Avancé](#Correction-du-TP-PHPPOOMVC-Avanc%C3%A9)
  - [Sommaire](#Sommaire)
  - [Étape 1 : Création des routes](#%C3%89tape-1--Cr%C3%A9ation-des-routes)
  - [Étape 2 : Création des contrôleurs](#%C3%89tape-2--Cr%C3%A9ation-des-contr%C3%B4leurs)
  - [Étape 3 : Ajout des vues de base](#%C3%89tape-3--Ajout-des-vues-de-base)
  - [Étape 4 : Modification de config.php](#%C3%89tape-4--Modification-de-configphp)
  - [Étape 5 : Ajout du code de base des listes et des formulaires](#%C3%89tape-5--Ajout-du-code-de-base-des-listes-et-des-formulaires)
  - [Étape 6 : Création des Models de base](#%C3%89tape-6--Cr%C3%A9ation-des-Models-de-base)
  - [Étape 7 : Mise à jour des contrôleurs et vues pour les listes](#%C3%89tape-7--Mise-%C3%A0-jour-des-contr%C3%B4leurs-et-vues-pour-les-listes)
  - [Étape 8 : Mise à jour des méthodes save() pour gérer les formulaires](#%C3%89tape-8--Mise-%C3%A0-jour-des-m%C3%A9thodes-save-pour-g%C3%A9rer-les-formulaires)
  - [Étape 9 : Mise à jour du formulaire de Registration](#%C3%89tape-9--Mise-%C3%A0-jour-du-formulaire-de-Registration)
  - [Étape 10 : Ajout de validations](#%C3%89tape-10--Ajout-de-validations)
  - [Étape 11 : Édit: création des vues](#%C3%89tape-11--%C3%89dit-cr%C3%A9ation-des-vues)
  - [Étape 12 : Remplir les formulaires d'édition](#%C3%89tape-12--Remplir-les-formulaires-d%C3%A9dition)
  - [Étape 13 : Gestion du delete](#%C3%89tape-13--Gestion-du-delete)
  - [Étape 14 : Ajout de redirections](#%C3%89tape-14--Ajout-de-redirections)
  - [Étape 15 : Ajout d'une validation avant suppression](#%C3%89tape-15--Ajout-dune-validation-avant-suppression)
  - [Étape 16 : Ajout des données de student et de course dans la page de Registration](#%C3%89tape-16--Ajout-des-donn%C3%A9es-de-student-et-de-course-dans-la-page-de-Registration)

## Étape 1 : Création des routes

> Commits : https://github.com/tomsihap/correction-mvc-project-avance/commit/5edb293fbdb1db00b51562c98715e4deed3179b4

Dans tout le projet, pensez à créer des noms **identiques** et prévisibles ! Regardez bien le nommage des routes dans le commit, elles sont toutes ressemblantes.

Pensez aussi à être exhaustif tout de suite sur toutes les routes qui existeront dans l'application.

> **Attention** : Pour les routes suivantes, respectez cet ordre :
```
GET 'student/{$id}/edit'
POST 'student/{$id}/edit'
GET 'student/{$id}/delete'
GET 'student/{$id}'
```
> La route la plus simple (`student/$id`) doit être en dernière.


## Étape 2 : Création des contrôleurs
> Commits : https://github.com/tomsihap/correction-mvc-project-avance/commit/90284a2de2e855163fbf4ada9ebd853ac1ef6cee

Les routes maintenant créées, créez immédiatement les contrôleurs et toutes les méthodes dans les contrôleurs.

> **Tip :** Comme vous avez nommé vos routes identiquement avec des même noms de méthodes... Une fois un contrôleur prêt, il suffit de copier coller les méthodes dans les autres !

> **Attention :** Faites bien attention aux routes prenant un paramètre (`students/$id/edit` par exemple), passez bien le paramètre dans la méthode du contrôleur.

## Étape 3 : Ajout des vues de base
> Commits : Code des controllers https://github.com/tomsihap/correction-mvc-project-avance/commit/41bb211b949993551b9d3c44602804687e3c382c

> Code des vues : https://github.com/tomsihap/correction-mvc-project-avance/commit/cb69eff84908276092594b3c18e161333df5f5d0

Nous allons commencer à créer nos premiers affichages dès maintenant : pour commencer, on va appeler les vues dans tous les contrôleurs appelant une vue.

Pour rappel, les vues :
1. On créée un dossier correspondant au Model dans le dossier `public/views`, par exemple `students`, `registrations` et `courses`

2. Dans ces dossiers, on créée les fichiers templates qui contiennent obligatoirement ces trois lignes de base :

```php
<?php ob_start(); ?>

<!-- Contenu de la vue -->

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>
```

3. Pour le nommage des fichiers : **gardez les identiques !!** Une page de liste va s'appeller `list.php` et ce quel que soit le model. Une page d'ajout va s'appeler `add.php` quel que soit le model.

> Deux intérêts à cela :
> 1/ on ne se pose plus la question de "comment s'appelle mon fichier déjà ?"
> 2/ Ça évite d'être redondant : appeler le fichier `students/list.php` est plus court et moins redondant que `students/list-students.php`

4. On appelle les vues dans le contrôleur de cette façon : `view('dossier.fichier')` :

`view('students.list')`

`view('registrations.list)`

`view('courses.list')`

Ou encore :

`view('students.edit')`

`view('registrations.edit)`

`view('courses.edit')`

> On voit à quel point l'appel des vues est facile quand tout a le même nom ! On n'a plus à rechercher le nom du fichier : on prend `nom_model` + `nom_standardisé_de_la_vue`.

## Étape 4 : Modification de config.php

On va être ammené à écrire des liens (grâce au helper `url()` par exemple), il faut donc configurer notre application dans le fichier `config.php` pour :

1. Que les liens pointent vers le bon dossier
2. Que la base de données se connecte bien

## Étape 5 : Ajout du code de base des listes et des formulaires

> Commit : Listes https://github.com/tomsihap/correction-mvc-project-avance/commit/1039573e4ae91b04c18a7227335dd4fa226ec0ed

> Commit : Formulaires https://github.com/tomsihap/correction-mvc-project-avance/commit/a1d5d83129d435a138b1e6b92cc4b663fb93953f

Il s'agit de simples tableaux et formulaires avec de la donnée factice dans les fichiers `list.php` et `add.php`.

## Étape 6 : Création des Models de base

> Commit: set, get, save, findAll() https://github.com/tomsihap/correction-mvc-project-avance/commit/f5295975ebae41a4ccf7f7c8b63a30f5e608a715

Pour mettre en place nos listes et formulaires, nous avons besoin de nos models et en particulier de :

1. **Setters** pour enrgistrer les données dans les objects
2. **Getters** pour récupérer les données des objects
3. Méthode `findAll()` pour récupérer tous les éléments en bdd
4. Méthode `save()` pour enregistrer l'object en bdd

**IMPORTANT** : De plus, comme nous avons un Model représentant nos données, la méthode `findAll()` ne doit pas retourner des arrays de données brutes mais plutôt un tableau contenant des objects de type Student, Registration, Course.

Pour cela, avant de retourner la data, on créée un object (par exemple `new Course`) pour chaque donnée de la bdd et on retourne le tableau contenant tous les objects :

> Commit: Mise à jour de findAll() https://github.com/tomsihap/correction-mvc-project-avance/commit/b5796e72cf33421279514c3da1a08d8c67e36315

> **NOTE  IMPORTANTE !!!** Dans le commit d'exemple, à cet endroit, il y a des `->save()` qui n'ont rien à faire là, cela a été corrigé dans le commit suivant : https://github.com/tomsihap/correction-mvc-project-avance/commit/d57094fab060e8a8adfee1e3f0e8ea8a24716220

## Étape 7 : Mise à jour des contrôleurs et vues pour les listes

> Commits : mise à jour des controllers https://github.com/tomsihap/correction-mvc-project-avance/commit/7c2ebecf2530d212e27b114f429ca11e6db39e03

Maintenant que nous avons nos models, on met à jour les controllers pour envoyer les données aux vues : par exemple, pour passer la variable `$students` à une vue, on la passe grâce à `compact('students')` :

```php
$students = Student::findAll();
view('students.list', compact('students') );
```

Côté views : on fait simplement un foreach de `$students` et on affiche les données grâce aux getters :

> mise à jour des vues https://github.com/tomsihap/correction-mvc-project-avance/commit/73e4ea6645a1bff1aa5988b498d2655731d6c382

## Étape 8 : Mise à jour des méthodes save() pour gérer les formulaires

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/750a2bef225965205414a7a12b6d7c17a71dea47

De même que l'étape 8, maintenant que notre Model existe, on met à jour les méthodes de traitement de formulaire pour enregistrer en base de données ce qui vient du formulaire.

**PENSEZ À TESTER VOS FORMULAIRES !**

## Étape 9 : Mise à jour du formulaire de Registration
> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/57c76aa315983071897ffb94da3faa5bb6bf1b2e
>
Ce formulaire est un peu particulier : il prend deux select concernant deux tables différentes : la liste des students, et la liste des courses.

Il suffit de :

1. Appeler les listes dans la méthode du controller : `Student::findAll()` et `Course::findAll()`

2. Les envoyer à la vue du formulaire de Registration (add.php)

3. Faire un foreach sur ces données là

## Étape 10 : Ajout de validations

Nos formulairs étant prêts et fonctionnels, on peut ajouter des validations dans les setters :

> Commit: validations https://github.com/tomsihap/correction-mvc-project-avance/commit/037f55366d7189093bcbac1eff73cf84bf2b0f40

## Étape 11 : Édit: création des vues

Nous avons presque terminé ! Nous allons traiter les formulaire d'édition. Les formulaires étant identiques, il s'agit en fait d'un `copier-coller` de `add.php`, dans un nouveau fichier `edit.php` !

> https://github.com/tomsihap/correction-mvc-project-avance/commit/12e03496fed1b7ba8f9185faa94386bcc4556846

Inspirez vous également de la méthode `add()` pour remplir la méthode `edit()` dans les contrôleurs, notamment pour RegistrationController qui a besoin de données en plus pour les selects.

## Étape 12 : Remplir les formulaires d'édition

Pour cela, on a besoin de :

1. Faire la méthode pour retrouver l'élément à éditer dans le Model
2. Appeler cette méthode depuis le controller
3. Envoyer cet élément de bdd à modifier à la vue

En fait, rien ne change jamais: le contrôleur prend la donnée du model et l'envoie à la vue comme d'habitude !

> Commit: méthodes findOne et création de l'object dans findOne https://github.com/tomsihap/correction-mvc-project-avance/commit/0cafa3f17eeea0f395436cb536ffb11d22f116ce

**TRÈS IMPORTANT** Comme pour findAll(), on créée un object dans la méthode `findOne()` que l'on retourne !

Une fois ces méthodes créées, on va les appeler dans le côntroleur et les envoyer à la vue :

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/5546f9c1832e603fa6688ac73fcd5df9e072af77


On met ensuite à jour les vues pour afficher les données dans les champs dorénavant préremplis puisqu'on édite :

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/91491ac97e88f56d4fdfc9b785b1098681d212ad

Pour les champs select de Registration c'est un petit peu différent, on va plutôt tester dans le foreach si la donnée du foreach est celle d'origine (si le student qui est dans le foreach est celui que l'on édite) :

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/85e335953454d79d03b315dbe05bd1b1a0d0e1a0

**Très important** On pense bien sûr à modifier les liens des formulaires que l'on a copié collé : l'action n'est plus vers `add` mais vers `$id/edit` !

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/a1cd7a913986a9c8d7eab7f622ed0e168faa9aa9


## Étape 13 : Gestion du delete

Après toutes nos étapes, la gestion du `delete` est en fait très simple :


1. On crée une méthode `delete` dans les Models pour qu'ils soient capables de supprimer des données :

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/df9df3f003f555a3856d4f2b6b2d52acb65ea486

> Attention, commit de correction (usage de `getId()` plutôt que de `id()`) : https://github.com/tomsihap/correction-mvc-project-avance/commit/03ea29a7063758b80002ea739eed1d1f692131cb

2. Comme nos liens sont tout prêts (on les avait fait dans les vues lorsque l'on a créé les pages de listes, et ils pointent vers `students/$id/delete`), et la méthode de controller `delete($id)` prête, on n'a plus qu'à, dans le controller, lorsque l'on clique sur un lien delete :
   1. Trouver l'objet à supprimer
   2. Le supprimer avec la méthode `delete() venant du Model

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/bc71dc18c7c754c67fcf4e5dcc46a53cb7dc13f4

## Étape 14 : Ajout de redirections

Le projet est quasiment terminé ! On fait les finitions en ajoutant des redirections à la fin des formulaires et des boutons delete pour revenir sur les listes.

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/00f74fb3af2566b0ccaefce2cde9f0236cefc682

**Note** : On essaie de faire les redirections en fin de projet, comme maintenant, pour pouvoir voir s'afficher les erreurs. Sinon, on est redirigés avant que l'erreur s'affiche.

## Étape 15 : Ajout d'une validation avant suppression

Il s'agit simplement d'un onclick sur les liens de suppression qui ouvre une boîte de dialogue de type `confirm()`. Si on valide, le lien continue, sinon rien ne se passe.

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/2b0f7f2dfdde894d1c11f60d89c061665379eb02

## Étape 16 : Ajout des données de student et de course dans la page de Registration

Pour l'instant, la liste des registrations n'affiche que `student_id` et `course_id`. On aimerait plutôt voir le nom du Student et le titre du Cours.

Pour cela, on va créer deux méthodes dans le model de Registration : `getStudent()` et `getCourse()`, qui vont tout simplement récupérer le student et le courser en fonction de l'id que l'on a :

> Commit : https://github.com/tomsihap/correction-mvc-project-avance/commit/1034369402e1fe39c637659d0ad249d4e55ba62c
