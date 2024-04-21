let judulHistory = ['PENAMAAN', 'AKTIVITAS PRA-DEBUT', 'PEMBENTUKAN GRUP NEWJEANS', 'PROSES DEBUT', 'PERJALANAN SUKSES TERBARU 2023'];

let history = ['Nama NewJeans memiliki dua arti. Pertama, menekankan bahwa jeans adalah busana yang tak lekang oleh waktu, mencerminkan keinginan grup untuk menciptakan citra abadi. Kedua, sebagai permainan kata dari "gen baru (new genes)," merujuk pada peran mereka sebagai pengantar generasi baru musik pop.', 
'Fakta mengejutkan bahwa jauh sebelum Newjeans terbentuk, beberapa anggota grup sudah aktif di industri hiburan. Danielle adalah anggota reguler dari Rainbow Kindergarten tvN, sebuah variety show yang ditayangkan pada tahun 2011.Hyein memulai debutnya sebagai anggota grup musik anak-anak U.SSO Girl pada November 2017 dengan nama panggung U.Jeong, sebelum berangkat dari grup satu tahun kemudian.Pada Desember 2020, ia bergabung dengan grup musik dan kolektif YouTube Play With Me Club yang dibentuk oleh PocketTV, dan lulus dari grup tersebut pada 3 Mei 2021. Hanni dan Minji menjadi cameo di video musik BTS tahun 2021 untuk "Permission to Dance"', 
'2019 - 2020 : Persiapan untuk girl grup baru hasil kolaborasi antara Big Hit Entertainment dan Source Music dimulai pada awal 2019 di bawah arahan Min Hee-Jin yang bergabung dengan perusahaan sebagai CBO pada tahun yang sama dan dikenal luas atas arahan seninya sebagai direktur visual di SM Entertainment. Audisi global berlangsung antara September dan Oktober 2019 dan casting grup dimulai pada awal tahun 2020. 2021 - 2022 : Newjeans dijadwalkan untuk diluncurkan, tapi ditunda karena pandemi Covid-19 dan proyek itu dipindahkan ke label independen ADOR milik Hybe yang baru didirikan, setelah Min ditunjuk sebagai CEO label tersebut. Putaran kedua audisi global diadakan antara Desember 2021 dan Januari 2022, dan susunan grup diselesaikan pada Maret 2022.' 
,'Proses debut mereka dimulai dengan merilis tiga video animasi pada 1 Juli 2022, yang diikuti oleh peluncuran single debut "Attention" pada 22 Juli yang diikuti dengan pengumuman Mini Album debut mereka yang akan datang, yang akan berisi empat lagu, termasuk dua single tambahan. EP Debut mereka yang berisi empat lagu mendapat respon positif, dengan pre-order melebihi 444.000 salinan dalam tiga hari. Album debut mereka terjual lebih dari satu juta salinan, menjadi album debut terlaris oleh artis wanita K-pop di Korea Selatan sejak 2011. Grup ini memenangkan berbagai penghargaan pendatang baru dan debut di berbagai tangga lagu. Lagu terbaru mereka, "Ditto," mencapai kesuksesan besar dan menjadi entri pertama mereka di Billboard Hot 100. Album pertama mereka, "OMG," meraih kesuksesan lebih lanjut dengan tema gaya retronya dan debut di nomor satu di Circle Album Chart.', 
'Pada April 2023, NewJeans merilis kolaborasi dengan Coca-Cola untuk "Zero." Single kedua, "Be Who You Are (Real Magic)," dirilis pada Mei 2023, dikerjakan sama dengan Coca-Cola bersama Jon Batiste, JID, dan Camilo. Fanmeeting pertama mereka, Bunnies Camp, diadakan pada 1-2 Juli 2023. Album mini kedua, "Get Up," dirilis pada 21 Juli 2023, menempati posisi kedua di Circle Album Chart. Album ini terjual 1,65 juta salinan dalam minggu pertama peluncurannya, menjadi album ketiga berturut-turut grup yang terjual lebih dari satu juta kopi. Single "Super Shy" mendominasi tangga lagu, membawa NewJeans meraih posisi pertama di Billboard Emerging Artists. Grup tampil di festival-festival besar seperti Lollapalooza dan Summer Sonic Festival di Amerika Serikat.'];

let index = 0;

function changeHistory(index) {
    $("#history-text").text(history[index]);
}

$("#prev").click(function() {
    index--;
    if (index < 0) {
        index = history.length - 1;
    }

    changeHistory(index);
})

$("#next").click(function() {
      index++;
    if (index >= history.length) {
        index = 0;
    }

    changeHistory(index);
})


