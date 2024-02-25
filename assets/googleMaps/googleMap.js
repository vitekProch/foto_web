import { Loader } from "@googlemaps/js-api-loader"
const cairo = { lat: 49.74361351611922, lng: 13.595000399387061 };


const loader = new Loader({
    apiKey: "AIzaSyAdG1ouT1R4NSuxvVfJzC2nlladL22hDcE",
    version: "weekly",
});

loader.load().then(async () => {
    async function initMap() {
        // Request needed libraries.
        const { Map, InfoWindow  } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        const map = new Map(document.getElementById("map"), {
            center: cairo,
            zoom: 15,
            mapId: 'e2be5ba57b60b741',
            gestureHandling: "cooperative",
        });

        const marker = new AdvancedMarkerElement({
            map,
            position: cairo,
            title: "Místo atelieru",
        });
        const contentString =`
            <div>
                <h2>Fotospektrum</h2>
                <p>Smetanova 49<br> 337 01 Rokycany 1 <br> Česko</p>
                <div class="navigate">
                    <div>
                        <a aria-label="Vyhledejte v Mapách Google trasu k tomuto místu." target="_blank"
                           href="https://www.google.cz/maps/place/Fotospektrum/@49.7439831,13.5926545,17.5z/data=!4m6!3m5!1s0x470afc834aea7159:0x81f33408d1bfa159!8m2!3d49.7436111!4d13.595!16s%2Fg%2F1v41z4y7?entry=ttu">
                            <div class="navigate-text">Zobrazit v Mapách Google</div>
                        </a>
                    </div>
                </div>
            </div>`;

        const infoWindow = new InfoWindow();
        marker.addListener("click", ({ domEvent, latLng }) => {
            infoWindow.setContent(contentString);
            infoWindow.open(marker.map, marker);
        });
    }


    initMap();
});