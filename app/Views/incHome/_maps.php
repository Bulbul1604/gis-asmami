 <div class="container-xxl py-5" id="peta">
     <div class="container">
         <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
             <h1 class="display-6 mt-5">Peta</h1>
             <p class="text-primary fs-5 mb-3">Persebaran UMKM ASMAMI Kota Bontang</p>
         </div>
         <div class="fadeInUp rounded-3" id="map" data-wow-delay="0.1s" style="height: 450px;"></div>
     </div>
 </div>

 <script>
     var map = L.map('map').setView([0.1397306, 117.4681409], 12);
     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
         maxZoom: 19,
         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
     }).addTo(map);

     let icon = L.icon({
         iconUrl: '<?= base_url('/icon.png') ?>',
     });

     <?php foreach ($usaha as $value) : ?>
         L.marker([<?= $value->lang_lat ?>], {
                 icon: icon
             })
             .bindPopup("<h6><?= ucwords($value->nama_usaha) ?></h6><br /><a href='<?= base_url('detail/' . $value->id) ?>' class='btn btn-sm btn-primary text-white px-4'>Detail</a>").
         addTo(map);
     <?php endforeach; ?>
 </script>
