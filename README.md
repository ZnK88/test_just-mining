- composer install
- cree .env (avec l'exemple) puis généré la clé
- php artisan make:install
- php artisan migrate
- Good !

Objectif : 

- ☑ Être capable d’afficher un graphique pour au moins deux cryptomonnaies.
- ☑ Les données du graphique doivent être chargées de manière asynchrones. (i.e: si le
graphique affiche le graphique du Bitcoin , un clic sur Ethereum devra provoquer un
appel backend).
- ~ L’interface devra être prévue pour de fortes demandes, on mettra alors tous les
dispositifs connus en œuvre pour rendre l'interface efficace.
- ☑ Un style CSS doit être appliqué (fais-toi plaisir), mais devra se passer de ressources
externes (comme bootstrap ou autres librairies de style)

CONTRAINTES : Laravel / HTML / CSS / JS ☑

RESSOURCES : ☑ CoinGecko (récupération du court), Google chart

BONUS : 

- ☐ Tâches CRON (fortement recommandé, voir laravel:Scheduled tasks)
- ☑ Pas d’utilisation de bootstrap (fortement recommandé)
- ☐ Données d’analyse (statistiques diverses) (recommandé)
- ☐ Ajouter une nouvelle cryptomonnaie à la liste (basé sur celles dispos sur la source)
- ☑ Responsive (pas 100% des cas géré)
- ☐Toute autre amélioration sera prise en compte

BUGS non gérés: 

- Certaine cryptomonnaie n'ont pas toute les informations , ce qui fait planté l'affichage (si sa arrive clear storage et utilisé une autre crypto...).
- améliorés les retours pour le graphique car les dernieres valeur ne sont pas affiché (trop de retour ?).

IDEE : 

- Stocker les cryptomonnaie choisie par compte utilisateur en BDD.
- Crée un rafraichissement automatique des cryptomonnaie (VueJS ?).
- Amélioré le CSS.
- Ajoutée d'autre limitation pour le graphique (info 7jr, 15 jr, 30 jr, tous ).
- Ajoutée d'autre statistique a affiché sur les cryptomonnaie (activable suivant les réglages du client).