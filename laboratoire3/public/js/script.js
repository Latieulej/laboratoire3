/*----------------------------------------*/
/*---------- GESTION DU PANIER -----------*/
/*----------------------------------------*/

// GESTION DES COOKIES
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// AJOUT 
function addToCart(produit) {
    var produit = JSON.stringify(produit);
    console.log(produit);
    // On vérifie s'il y a déjà des produits dans le panier
    var cart = getCookie('cart')
    if (cart == "") { // Le cookie n'a pas encore été créé
        setCookie('cart', produit, 7);
    } else { // Cookie existant
        var oldCart = cart; // On récupère la valeur existante
        setCookie('cart', '', -1);//On supprime le cookie
        setCookie('cart', oldCart + "," + produit, 7); //On créée le nouveau
    }
}

// VIDER LE PANIER
function deleteCart() {
    if(confirm("Êtes-vous sûr de vouloir supprimer votre panier ?")) { // On redemande confirmation avant la suppression
        setCookie('cart','',-1) ; // Suppression du cookie
        location.reload(); // Rechargement de la page
    } 
}