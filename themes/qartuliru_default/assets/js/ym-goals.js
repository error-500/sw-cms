//(function() {
/*if (typeof ym === 'undefined') {
    return;
}*/
jQuery(function() {
    let trg = document.querySelectorAll('.btn-cart');
    console.log('Cart buttons list: ', trg);
    trg.forEach((item, idx) => {
        item.addEventListener('click', (event) => {
            console.log(`Cart click: ${document.yandexId}`, event);
            ym(document.yandexId, 'reachGoal', 'Cart');
            return true;
        }, {
            capture: true
        }, true);
    });
    trg = document.querySelector('.btn-checkout');
    if (trg) {
        trg.addEventListener('click', (event) => {
            console.log(`Checkout start ${document.yandexId}: `, event);
            ym(document.yandexId, 'reachGoal', 'Сheckout');
            return true;
        }, {
            capture: true
        }, true);
    }

    trg = document.querySelector('.btn-order');
    if (trg) {
        trg.addEventListener('click', (event) => {
            console.log(`Send order ${document.yandexId}: `, event);
            ym(document.yandexId, 'reachGoal', 'Оrder');
            return true;
        }, {
            capture: true
        }, true);
    }
});
//})();