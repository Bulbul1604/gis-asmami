 <div class="container-xxl py-5" id="peta">
     <div class="container">
         <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
             <h1 class="display-6 mt-5">Peta</h1>
             <p class="text-primary fs-5 mb-3">Persebaran UMKM ASMAMI Kota Bontang</p>
         </div>
         <div class="fadeInUp rounded-3" id="map" data-wow-delay="0.1s" style="height: 550px;"></div>
     </div>
 </div>

 <script>
     var data = [
         <?php foreach ($usaha as $value) : ?> {
                 "id": [<?= $value->id ?>],
                 "loc": [<?= $value->lang_lat ?>],
                 "title": "<?= $value->nama_usaha ?>",
                 "kategori_usaha": "<?= $value->kategori_usaha ?>",
                 "alamat": "<?= $value->alamat ?>",
                 "kelurahan": "<?= $value->kelurahan ?>",
                 "kecamatan": "<?= $value->kecamatan ?>",
             },
         <?php endforeach; ?>
     ];
     var map = L.map('map').setView([0.1397306, 117.4681409], 12);

     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
         maxZoom: 19,
         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
     }).addTo(map);

     let makan = L.icon({
         iconUrl: '<?= base_url('src/marker/makan.png') ?>',
         iconSize: [24, 24],
     });
     let minum = L.icon({
         iconUrl: '<?= base_url('src/marker/minum.png') ?>',
         iconSize: [24, 24],
     });
     let makanminum = L.icon({
         iconUrl: '<?= base_url('src/marker/makanminum.png') ?>',
         iconSize: [24, 24],
     });

     var marker = L.circleMarker(L.latLng(29.702368038541767, 120.47607421874999), {
         radius: 6,
         fillColor: "#ff0000",
         color: "blue",
         weight: 2,
         opacity: 1,
         fillOpacity: 0.6,
     });

     var latlngs = [
         [
             29.204918463909035,
             119.6246337890625,
         ],
         [
             29.79358002272772,
             120.27008056640624,
         ],
         [
             29.70087695780884,
             120.2984046936035,
         ]
     ];
     var polyline = L.polyline(latlngs, {
         color: 'red'
     }).addTo(map);

     const legend = L.control.Legend({
             position: "bottomleft",
             collapsed: false,
             symbolWidth: 24,
             opacity: 1,
             column: 1,
             legends: [{
                 label: "Makanan",
                 type: "image",
                 url: "src/marker/makan.png",
             }, {
                 label: "Minuman",
                 type: "image",
                 url: "src/marker/minum.png"
             }, {
                 label: "Makanan/ Minuman",
                 type: "image",
                 url: "src/marker/makanminum.png"
             }, ]
         })
         .addTo(map);
     var comp = new L.Control.Compass({
         autoActive: true,
         showDigit: true
     });

     map.addControl(comp);

     var markersLayer = new L.LayerGroup(); //layer contain searched elements

     map.addLayer(markersLayer);

     var controlSearch = new L.Control.Search({
         position: 'topright',
         layer: markersLayer,
         initial: false,
         zoom: 18,
         marker: false
     });

     map.addControl(controlSearch);
     ////////////populate map with markers from sample data
     for (i in data) {
         var title = data[i].title, //value searched
             loc = data[i].loc, //position found
             id = data[i].id, //position found
             alamat = data[i].alamat, //position found
             kelurahan = data[i].kelurahan, //position found
             kecamatan = data[i].kecamatan, //position found
             kategori_usaha = data[i].kategori_usaha; //position found
         if (kategori_usaha == 'makanan') {
             CustomTitle = title;
             CustomIcon = makan;
         } else if (kategori_usaha == 'minuman') {
             CustomTitle = title;
             CustomIcon = minum;
         } else if (kategori_usaha == 'makanan/minuman') {
             CustomTitle = title;
             CustomIcon = makanminum;
         }
         marker = new L.Marker(new L.latLng(loc), {
             title: CustomTitle,
             icon: CustomIcon,
         }); //se property searched
         marker.bindPopup(`<h6 style='letter-spacing: 1px;'>${title}</h6><span>${alamat} - ${kelurahan} - ${kecamatan}</span><br /><br /><a href='<?= base_url() ?>detail/${id}' class='text-primary'>Detail UMKM</a>`);
         //  marker.bindPopup('title: ' + title);
         markersLayer.addLayer(marker);
     }
 </script>
