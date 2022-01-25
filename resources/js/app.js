window.createMap = function(containerID = 'map', options = {}){
    const map = new L.Map(containerID, {
        key: document.querySelector('meta[name="map-api-key"]').getAttribute('content'),
        maptype: 'dreamy',
        poi: true,
        traffic: false,
        center: [35.712510430860604, 51.38322830200196],
        zoom: 12,
        ...options
    });

    return map;
}
