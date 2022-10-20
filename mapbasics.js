var myMap;

// Дождёмся загрузки API и готовности DOM.
ymaps.ready(init);

function init () {
    // Создание экземпляра карты и его привязка к контейнеру с
    // заданным id ("map").
    myMap = new ymaps.Map('map', {
        // При инициализации карты обязательно нужно указать
        // её центр и коэффициент масштабирования.
        center: [59.442714, 24.889406], // Москва
        zoom: 100
    });
    myPlacemark = new ymaps.Placemark([59.442714, 24.889406], {
        // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
        balloonContentHeader: "me:)",
        balloonContentBody: "<em>>:(</em>",
        balloonContentFooter: "",
        hintContent: ""
    });

    myMap.geoObjects.add(myPlacemark);
}