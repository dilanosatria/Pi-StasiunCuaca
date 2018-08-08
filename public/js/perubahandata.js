    $( document ).ready(function() {
    $('#infocolapse').collapse('show');
    });

    function doPageReset()
    {
        //-----------------------------------------------------------------------------------------Teks
        var objTag = document.getElementById("gambariot");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'img/Pilih.gif');
        }   
        //-----------------------------------------------------------------------------------------Teks
        var objTag = document.getElementById("juduldata").innerHTML = "Silahkan pilih lokasi stasiun cuaca!";
        //-----------------------------------------------------------------------------------------Maps
        var objTag = document.getElementById("headermaps");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/peta/MapsEmpty.html');
        }
        //-----------------------------------------------------------------------------------------Gauge
        var objTag = document.getElementById("gauges1");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugetempEmpty.html');
        }
        var objTag = document.getElementById("gauges2");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugehumidityEmpty.html');
        }
        var objTag = document.getElementById("gauges3");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugepressureEmpty.html');
        }
        var objTag = document.getElementById("gauges4");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugelightEmpty.html');
        }
        var objTag = document.getElementById("gauges5");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugerainEmpty.html');
        }
        var objTag = document.getElementById("gauges6");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugedewEmpty.html');
        }
        //-----------------------------------------------------------------------------------------iframe
        var objTag = document.getElementById("iframetemp");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/475668/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Temperatur');
        }
            var objTag = document.getElementById("iframekelembaban");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/475668/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Kelembaban');
        }
            var objTag = document.getElementById("iframetekanan");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/475668/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Tekanan+Atmosfer');
        }
            var objTag = document.getElementById("iframecahaya");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/475668/charts/6?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Intensitas+Cahaya');
        }
            var objTag = document.getElementById("iframehujan");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/475668/charts/7?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Intensitas+Hujan');
        }
            var objTag = document.getElementById("iframeembun");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/475668/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Titik+Embun');
        }
        $('#infocolapse2').collapse('hide');
        $('#infocolapse').collapse('hide');
        document.getElementById("lokasi").innerHTML = "Data Stasiun Cuaca";
        document.getElementById("intro").innerHTML = "Silahkan memilih stasiun cuaca terlebih dahulu melalui menu navigasi.";
        document.getElementById("data-1").innerHTML = "-";
        document.getElementById("data-2").innerHTML = "-";
        document.getElementById("data-3").innerHTML = "-";
        document.getElementById("data-4").innerHTML = "-";
        document.getElementById("data-5").innerHTML = "-";
        document.getElementById("data-6").innerHTML = "-";
        $('#infocolapse').collapse('show');
         
    }

        function dodata(id)
        {
        var button = document.getElementById(id)
        var nama = button.getAttribute('data-nama');
        var id_peta = button.getAttribute('data-id_peta');
        var id_gambar = button.getAttribute('data-id_gambar');
        var kota = button.getAttribute('data-kota');
        var lokasi = button.getAttribute('data-lokasi');
        var gauge_temp = button.getAttribute('data-gauge_temp');
        var gauge_kelembaban = button.getAttribute('data-gauge_kelembaban');
        var gauge_tekanan = button.getAttribute('data-gauge_tekanan');
        var gauge_cahaya = button.getAttribute('data-gauge_cahaya');
        var gauge_hujan = button.getAttribute('data-gauge_hujan');
        var gauge_embun = button.getAttribute('data-gauge_embun');
        var iframe_temp = button.getAttribute('data-iframe_temp');
        var iframe_kelembaban = button.getAttribute('data-iframe_kelembaban');
        var iframe_tekanan = button.getAttribute('data-iframe_tekanan');
        var iframe_cahaya = button.getAttribute('data-iframe_cahaya');
        var iframe_hujan = button.getAttribute('data-iframe_hujan');
        var iframe_embun = button.getAttribute('data-iframe_embun');

        //-----------------------------------------------------------------------------------------Teks
        var objTag = document.getElementById("gambariot");
        if (objTag != null)
        {
            if(id_gambar !="")
            {
            objTag.setAttribute('src', 'storage/'+id_gambar);
            } else {
            objTag.setAttribute('src', 'img/Pilih.gif');
            }

        }   
        //-----------------------------------------------------------------------------------------Teks
        var objTag = document.getElementById("juduldata").innerHTML=('Data Cuaca: '+nama);
        var objTag = document.getElementById("lokasi").innerHTML = (kota+' - '+lokasi);
        //-----------------------------------------------------------------------------------------Maps
        var objTag = document.getElementById("headermaps");
        if (objTag != null)
        {
            // objTag.setAttribute('data', 'pages/peta/'+id_peta+'.html');
            objTag.setAttribute('data', 'storage/'+id_peta);
        }
        //-----------------------------------------------------------------------------------------Gauge
        var objTag = document.getElementById("gauges1");
        if (objTag != null)
        {
            // objTag.setAttribute('data', 'pages/'+gauge_temp+'.html');
            objTag.setAttribute('data', 'storage/'+gauge_temp);
        }
        var objTag = document.getElementById("gauges2");
        if (objTag != null)
        {
            // objTag.setAttribute('data', 'pages/'+gauge_kelembaban+'.html');
            objTag.setAttribute('data', 'storage/'+gauge_kelembaban);
        }
        var objTag = document.getElementById("gauges3");
        if (objTag != null)
        {
            // objTag.setAttribute('data', 'pages/'+gauge_tekanan+'.html');
            objTag.setAttribute('data', 'storage/'+gauge_tekanan);
        }
        var objTag = document.getElementById("gauges4");
        if (objTag != null)
        {
            // objTag.setAttribute('data', 'pages/'+gauge_cahaya+'.html');
            objTag.setAttribute('data', 'storage/'+gauge_cahaya);
        }
        var objTag = document.getElementById("gauges5");
        if (objTag != null)
        {
            // objTag.setAttribute('data', 'pages/'+gauge_hujan+'.html');
            objTag.setAttribute('data', 'storage/'+gauge_hujan);
        }
        var objTag = document.getElementById("gauges6");
        if (objTag != null)
        {
            // objTag.setAttribute('data', 'pages/'+gauge_embun+'.html');
            objTag.setAttribute('data', 'storage/'+gauge_embun);
        }           
        //-----------------------------------------------------------------------------------------iframe
        var objTag = document.getElementById("iframetemp");
        if (objTag != null)
        {
            objTag.setAttribute('src', iframe_temp);
        }
            var objTag = document.getElementById("iframekelembaban");
        if (objTag != null)
        {
            objTag.setAttribute('src', iframe_kelembaban);
        }
            var objTag = document.getElementById("iframetekanan");
        if (objTag != null)
        {
            objTag.setAttribute('src', iframe_tekanan);
        }
            var objTag = document.getElementById("iframecahaya");
        if (objTag != null)
        {
            objTag.setAttribute('src', iframe_cahaya);
        }
            var objTag = document.getElementById("iframehujan");
        if (objTag != null)
        {
            objTag.setAttribute('src', iframe_hujan);
        }
            var objTag = document.getElementById("iframeembun");
        if (objTag != null)
        {
            objTag.setAttribute('src', iframe_embun);
        }
        // $('#infocolapse').on('shown.bs.collapse', function () {
        //   var objTag = document.getElementById("tombolcollapse").click();
        // });
        // var objTag = document.getElementById("tombolcollapse").click();

        

            //         $('#infocolapse').on('hidden.bs.collapse', function () {
            //   $('#infocolapse').collapse('show');
            // })
            dohidedata();
            setTimeout(showdata, 1000);
            document.getElementById("intro").innerHTML = "";
        }

        function dohidedata()
        {
            $('#infocolapse').collapse('hide');
        }

        function showdata() {
            $('#infocolapse').collapse('show');
        }

        // function doupdate(id){
        //     var refresh = setInterval(dohidedata,5000);
        //     var refresh2 = setInterval(showdata,1000);
        //     var refresh3 = setInterval(dopulldata(id),1000);
        // }
        function doupdatedata(id){
            var button = document.getElementById(id)
            var idrefresh =  button.getAttribute('data-id');
            // dopulldata(idrefresh);
            var refresh = setInterval(dopulldata(idrefresh), 30000);
        }
        
        function dopulldata(id){
            
            $('#infocolapse2').collapse('show');
            var button = document.getElementById(id)
            var kunciapi = button.getAttribute('data-field_embun');
            var channel= button.getAttribute('data-channel');
            var field_temp = button.getAttribute('data-field_temp');
            var field_kelembaban = button.getAttribute('data-field_kelembaban');
            var field_tekanan = button.getAttribute('data-field_tekanan');
            var field_cahaya = button.getAttribute('data-field_cahaya');
            var field_hujan = button.getAttribute('data-field_hujan');
            var field_embun = button.getAttribute('data-field_embun');          
         
            var update;
            $.getJSON('https://api.thingspeak.com/channels/' + channel + '/feed/last.json?api_key=' + kunciapi + '&timezone=Asia/Jakarta', function(data) {

              update = data.created_at;
              p1 = data.field1;
              p2 = data.field2;
              p3 = data.field3;
              p4 = data.field4;
              p5 = data.field5;
              p6 = data.field6;
              p7 = data.field7;
              p8 = data.field8;

              var d1 = window['p'+field_temp];
              var d2 = window['p'+field_kelembaban];
              var d3 = window['p'+field_tekanan];
              var d4 = window['p'+field_cahaya];
              var d5 = window['p'+field_hujan];
              var d6 = window['p'+field_embun];
              if (update) {
                
                document.getElementById("tanggal").innerHTML = update.slice(0, 10);
                document.getElementById("jam").innerHTML = (" "+update.slice(11, 19));
                document.getElementById("data-1").innerHTML = d1;
                document.getElementById("data-2").innerHTML = d2;
                document.getElementById("data-3").innerHTML = d3;
                document.getElementById("data-4").innerHTML = d4;
                document.getElementById("data-5").innerHTML = d5;
                document.getElementById("data-6").innerHTML = d6;
                // document.getElementById("data-7").innerHTML = p7;
                // document.getElementById("data-8").innerHTML = p8;

              }

            });
            
          }

          // var channel_id = 463743;
          // var api_key = '';

          // google.setOnLoadCallback(initChart);

          // function loadData() {
          //   var p;

          //   $.getJSON('https://api.thingspeak.com/channels/' + channel_id + '/feed/last.json?api_key=' + api_key, function(data) {

          //     p = data.field1;
          //     p2 = data.field2;
          //     p3 = data.field3;
          //     p4 = data.field4;
          //     p5 = data.field5;
          //     p6 = data.field6;
          //     p7 = data.field7;
          //     p8 = data.field8;

          //     if (p) 
          //     {
          //         document.getElementById("data-1").innerHTML = p;
          //         document.getElementById("data-2").innerHTML = p2;
          //         document.getElementById("data-3").innerHTML = p3;
          //         document.getElementById("data-4").innerHTML = p4;
          //         document.getElementById("data-5").innerHTML = p5;
          //         document.getElementById("data-6").innerHTML = p6;
          //         document.getElementById("data-7").innerHTML = p7;
          //         document.getElementById("data-8").innerHTML = p8;
          //     }
          //   });
          // }

          // function initChart() {    
          //   loadData();
          //   setInterval('loadData()', 15000);
          // }

    /*function doDepokUG()
    {
        //-----------------------------------------------------------------------------------------Teks
        var objTag = document.getElementById("juduldata").innerHTML = "Data stasiun cuaca: Depok - Universitas Gunadarma";
        //-----------------------------------------------------------------------------------------Maps
        var objTag = document.getElementById("headermaps");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/MapsDepokUG.html');
        }
        //-----------------------------------------------------------------------------------------Gauge
        var objTag = document.getElementById("gauges1");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugetempDepokUG.html');
        }
        var objTag = document.getElementById("gauges2");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugehumidityDepokUG.html');
        }
        var objTag = document.getElementById("gauges3");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugepressureDepokUG.html');
        }
        var objTag = document.getElementById("gauges4");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugelightDepokUG.html');
        }
        var objTag = document.getElementById("gauges5");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugerainDepokUG.html');
        }
        var objTag = document.getElementById("gauges6");
        if (objTag != null)
        {
            objTag.setAttribute('data', 'pages/GaugedewDepokUG.html');
        }           
        //-----------------------------------------------------------------------------------------iframe
        var objTag = document.getElementById("iframetemp");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/463743/charts/8?bgcolor=%23ffffff&color=%23d62020&days=3&dynamic=true&results=60&title=Temperatur&type=line&xaxis=Waktu&yaxis=Derajat+Selsius');
        }
            var objTag = document.getElementById("iframekelembaban");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/463743/charts/2?bgcolor=%23ffffff&color=%23d62020&days=3&dynamic=true&results=60&title=Kelembaban+Udara&type=line&xaxis=Waktu&yaxis=Kelembaban+%25');
        }
            var objTag = document.getElementById("iframetekanan");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/463743/charts/4?bgcolor=%23ffffff&color=%23d62020&days=3&dynamic=true&results=60&title=Tekanan+Atmosfer&type=line&xaxis=Waktu&yaxis=hPa');
        }
            var objTag = document.getElementById("iframecahaya");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/463743/charts/6?bgcolor=%23ffffff&color=%23d62020&days=3&dynamic=true&results=60&title=Intensitas+Cahaya&type=line&xaxis=Waktu&yaxis=lux');
        }
            var objTag = document.getElementById("iframehujan");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/463743/charts/7?bgcolor=%23ffffff&color=%23d62020&days=3&dynamic=true&results=60&title=Curah+Hujan&type=line&xaxis=Waktu&yaxis=mm');
        }
            var objTag = document.getElementById("iframeembun");
        if (objTag != null)
        {
            objTag.setAttribute('src', 'https://thingspeak.com/channels/463743/charts/3?bgcolor=%23ffffff&color=%23d62020&days=3&dynamic=true&results=60&title=Titik+Embun&type=line&xaxis=Waktu&yaxis=Derajat+Selsius');
        }
    
    }*/

    /*function doBogorKaradenan()
    {
    var objTag = document.getElementById("headermaps");
    if (objTag != null)
    {
        objTag.setAttribute('data', 'pages/MapsBogorKaradenan.html');
    }
    }

    function doGaugesDepokUG()
    {
            
    }

    function doNamaReset()
    {
    
    }
    function doNamaDepokUG()
    {
    
    }
    function doNamaDepok1()
    {
    var objTag = document.getElementById("juduldata").innerHTML = "Data stasiun cuaca: Depok - Depok #1";
    }
    function doNamaDepok2()
    {
    var objTag = document.getElementById("juduldata").innerHTML = "Data stasiun cuaca: Depok - Depok #2";
    }
    function doNamaBogorKaradenan()
    {
    var objTag = document.getElementById("juduldata").innerHTML = "Data stasiun cuaca: Bogor - Karadenan";
    }
    function doNamaBogor1()
    {
    var objTag = document.getElementById("juduldata").innerHTML = "Data stasiun cuaca: Bogor - Bogor #1";
    }
    function doNamaBogor2()
    {
    var objTag = document.getElementById("juduldata").innerHTML = "Data stasiun cuaca: Bogor - Bogor #2";
    }

    function doIframeDepokUG()
    {
    
    }*/