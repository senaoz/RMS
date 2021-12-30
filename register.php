<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.cs">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("parameters.php"); include("db.php");

$u_mail = $_SESSION["u_mail"];

if ($_SESSION['role'] == 'Admin') {
      $m = "Administrators can register new users to the system with this page. Please fill out the form for each new user.";
      echo "<script type='text/javascript'>alert('$m');</script>";
  }
else {
    header("Location: index.php"); } ?>

<?php
if (isset($_POST["submit"])) {
    $u_mail = $_POST["u_mail"];
    $u_name = $_POST["u_name"];
    $u_surname = $_POST["u_surname"];
    $u_phone = $_POST["u_phone"];
    $u_country = $_POST["u_country"];
    $u_city = $_POST["u_city"];
    $u_uni = $_POST["u_uni"];
    $u_password = $_POST["u_password"];
    $role = $_POST["role"];

    $query = "INSERT INTO `users` (`u_mail`, `u_name`, `u_surname`, `u_phone`, `u_country`, `u_city`, `u_uni`, `u_password`, `role`) VALUES ('$u_mail', '$u_name', '$u_surname', '$u_phone', '$u_country', '$u_city', '$u_uni', '$u_password', '$role')";
    $result = $db -> query($query);
    if ($result) {
        $message = "Your account is created. You can login right now.";
    } else {
        $message = "Something wrong. Please try again.";
    }
} ?>

<div>
    <span class="gradientText">New User Registration</span>
    <h3>Administrators can register new users to the system with this page. Please fill out the form for each new user.</h3>
    <p align="center"><?php if(isset($message)) { echo $message; } ?></p>
    <form action="register.php" method="post">
        <label>Select The Role Of User</label>
        <select id="role" name="role">
            <option id='Admin'>Admin</option>
            <option id='Professor'>Professor</option>
            <option id='Student'>Student</option>
        </select>
        <div class="inlineBlock" style="padding-right: 1%;">
            <label>Name</label>
            <input type="text" name="u_name" required>
            <label>Country</label>
            <input type="text" name="u_country">
        </div><div class="inlineBlock" style="padding-left: 1%;">
            <label>Surname</label>
            <input type="text" name="u_surname" required>
            <label>City</label>
            <input type="text" name="u_city">
        </div>
        <label>E-mail</label>
        <input type="email" name="u_mail" placeholder="test@gmail.com" required>
        <label>Phone Number</label>
        <input type="text" name="u_phone" placeholder="+90 505 123 45 67">
        <label>University</label>
        <select name="u_uni">
            <option id='Abant İzzet Baysal Üniversitesi'>Abant İzzet Baysal Üniversitesi</option>
            <option id='Abdullah Gül Üniversitesi'>Abdullah Gül Üniversitesi</option>
            <option id='Acıbadem Mehmet Ali Aydınlar Üniversitesi'>Acıbadem Mehmet Ali Aydınlar Üniversitesi</option>
            <option id='Adana Bilim Ve Teknoloji Üniversitesi'>Adana Bilim Ve Teknoloji Üniversitesi</option>
            <option id='Adıyaman Üniversitesi'>Adıyaman Üniversitesi</option>
            <option id='Adnan Menderes Üniversitesi'>Adnan Menderes Üniversitesi</option>
            <option id='Afyon Kocatepe Üniversitesi'>Afyon Kocatepe Üniversitesi</option>
            <option id='Ağrı İbrahim Çeçen Üniversitesi'>Ağrı İbrahim Çeçen Üniversitesi</option>
            <option id='Ahi Evran Üniversitesi'>Ahi Evran Üniversitesi</option>
            <option id='Akdeniz Üniversitesi'>Akdeniz Üniversitesi</option>
            <option id='Aksaray Üniversitesi'>Aksaray Üniversitesi</option>
            <option id='Alanya Alaaddin Keykubat Üniversitesi'>Alanya Alaaddin Keykubat Üniversitesi</option>
            <option id='Alanya Hamdullah Emin Paşa Üniversitesi'>Alanya Hamdullah Emin Paşa Üniversitesi</option>
            <option id='Altınbaş Üniversitesi'>Altınbaş Üniversitesi</option>
            <option id='Amasya Üniversitesi'>Amasya Üniversitesi</option>
            <option id='Anadolu Üniversitesi'>Anadolu Üniversitesi</option>
            <option id='Ankara Sosyal Bilimler Üniversitesi'>Ankara Sosyal Bilimler Üniversitesi</option>
            <option id='Ankara Üniversitesi'>Ankara Üniversitesi</option>
            <option id='Ankara Yıldırım Beyazıt Üniversitesi'>Ankara Yıldırım Beyazıt Üniversitesi</option>
            <option id='Antalya Akev Üniversitesi'>Antalya Akev Üniversitesi</option>
            <option id='Antalya Bilim Üniversitesi'>Antalya Bilim Üniversitesi</option>
            <option id='Ardahan Üniversitesi'>Ardahan Üniversitesi</option>
            <option id='Artvin Çoruh Üniversitesi'>Artvin Çoruh Üniversitesi</option>
            <option id='Ataşehir Adıgüzel Meslek Yüksekokulu'>Ataşehir Adıgüzel Meslek Yüksekokulu</option>
            <option id='Atatürk Üniversitesi'>Atatürk Üniversitesi</option>
            <option id='Atılım Üniversitesi'>Atılım Üniversitesi</option>
            <option id='Avrasya Üniversitesi'>Avrasya Üniversitesi</option>
            <option id='Avrupa Meslek Yüksekokulu'>Avrupa Meslek Yüksekokulu</option>
            <option id='Bahçeşehir Üniversitesi'>Bahçeşehir Üniversitesi</option>
            <option id='Balıkesir Üniversitesi'>Balıkesir Üniversitesi</option>
            <option id='Bandırma Onyedi Eylül Üniversitesi'>Bandırma Onyedi Eylül Üniversitesi</option>
            <option id='Bartın Üniversitesi'>Bartın Üniversitesi</option>
            <option id='Başkent Üniversitesi'>Başkent Üniversitesi</option>
            <option id='Batman Üniversitesi'>Batman Üniversitesi</option>
            <option id='Bayburt Üniversitesi'>Bayburt Üniversitesi</option>
            <option id='Beykent Üniversitesi'>Beykent Üniversitesi</option>
            <option id='Beykoz Üniversitesi'>Beykoz Üniversitesi</option>
            <option id='Bezm-İ Âlem Vakıf Üniversitesi'>Bezm-İ Âlem Vakıf Üniversitesi</option>
            <option id='Bilecik Şeyh Edebali Üniversitesi'>Bilecik Şeyh Edebali Üniversitesi</option>
            <option id='Bingöl Üniversitesi'>Bingöl Üniversitesi</option>
            <option id='Biruni Üniversitesi'>Biruni Üniversitesi</option>
            <option id='Bitlis Eren Üniversitesi'>Bitlis Eren Üniversitesi</option>
            <option id='Boğaziçi Üniversitesi'>Boğaziçi Üniversitesi</option>
            <option id='Bozok Üniversitesi'>Bozok Üniversitesi</option>
            <option id='Bursa Teknik Üniversitesi'>Bursa Teknik Üniversitesi</option>
            <option id='Bülent Ecevit Üniversitesi'>Bülent Ecevit Üniversitesi</option>
            <option id='Canik Başarı Üniversitesi'>Canik Başarı Üniversitesi</option>
            <option id='Cumhuriyet Üniversitesi'>Cumhuriyet Üniversitesi</option>
            <option id='Çağ Üniversitesi'>Çağ Üniversitesi</option>
            <option id='Çanakkale Onsekiz Mart Üniversitesi'>Çanakkale Onsekiz Mart Üniversitesi</option>
            <option id='Çankaya Üniversitesi'>Çankaya Üniversitesi</option>
            <option id='Çankırı Karatekin Üniversitesi'>Çankırı Karatekin Üniversitesi</option>
            <option id='Çukurova Üniversitesi'>Çukurova Üniversitesi</option>
            <option id='Dicle Üniversitesi'>Dicle Üniversitesi</option>
            <option id='Doğuş Üniversitesi'>Doğuş Üniversitesi</option>
            <option id='Dokuz Eylül Üniversitesi'>Dokuz Eylül Üniversitesi</option>
            <option id='Dumlupınar Üniversitesi'>Dumlupınar Üniversitesi</option>
            <option id='Düzce Üniversitesi'>Düzce Üniversitesi</option>
            <option id='Ege Üniversitesi'>Ege Üniversitesi</option>
            <option id='Erciyes Üniversitesi'>Erciyes Üniversitesi</option>
            <option id='Erzincan Üniversitesi'>Erzincan Üniversitesi</option>
            <option id='Erzurum Teknik Üniversitesi'>Erzurum Teknik Üniversitesi</option>
            <option id='Eskişehir Osmangazi Üniversitesi'>Eskişehir Osmangazi Üniversitesi</option>
            <option id='Faruk Saraç Tasarım Meslek Yüksekokulu'>Faruk Saraç Tasarım Meslek Yüksekokulu</option>
            <option id='Fatih Sultan Mehmet Vakıf Üniversitesi'>Fatih Sultan Mehmet Vakıf Üniversitesi</option>
            <option id='Fırat Üniversitesi'>Fırat Üniversitesi</option>
            <option id='Galatasaray Üniversitesi'>Galatasaray Üniversitesi</option>
            <option id='Gazi Üniversitesi'>Gazi Üniversitesi</option>
            <option id='Gaziantep Üniversitesi'>Gaziantep Üniversitesi</option>
            <option id='Gaziosmanpaşa Üniversitesi'>Gaziosmanpaşa Üniversitesi</option>
            <option id='Gebze Teknik Üniversitesi'>Gebze Teknik Üniversitesi</option>
            <option id='Giresun Üniversitesi'>Giresun Üniversitesi</option>
            <option id='Gümüşhane Üniversitesi'>Gümüşhane Üniversitesi</option>
            <option id='Hacettepe Üniversitesi'>Hacettepe Üniversitesi</option>
            <option id='Hakkari Üniversitesi'>Hakkari Üniversitesi</option>
            <option id='Haliç Üniversitesi'>Haliç Üniversitesi</option>
            <option id='Harran Üniversitesi'>Harran Üniversitesi</option>
            <option id='Hasan Kalyoncu Üniversitesi'>Hasan Kalyoncu Üniversitesi</option>
            <option id='Hitit Üniversitesi'>Hitit Üniversitesi</option>
            <option id='Iğdır Üniversitesi'>Iğdır Üniversitesi</option>
            <option id='Işık Üniversitesi'>Işık Üniversitesi</option>
            <option id='İbn Haldun Üniversitesi'>İbn Haldun Üniversitesi</option>
            <option id='İhsan Doğramacı Bilkent Üniversitesi'>İhsan Doğramacı Bilkent Üniversitesi</option>
            <option id='İnönü Üniversitesi'>İnönü Üniversitesi</option>
            <option id='İskenderun Teknik Üniversitesi'>İskenderun Teknik Üniversitesi</option>
            <option id='İstanbul 29 Mayıs Üniversitesi'>İstanbul 29 Mayıs Üniversitesi</option>
            <option id='İstanbul Arel Üniversitesi'>İstanbul Arel Üniversitesi</option>
            <option id='İstanbul Aydın Üniversitesi'>İstanbul Aydın Üniversitesi</option>
            <option id='İstanbul Ayvansaray Üniversitesi'>İstanbul Ayvansaray Üniversitesi</option>
            <option id='İstanbul Bilgi Üniversitesi'>İstanbul Bilgi Üniversitesi</option>
            <option id='İstanbul Bilim Üniversitesi'>İstanbul Bilim Üniversitesi</option>
            <option id='İstanbul Esenyurt Üniversitesi'>İstanbul Esenyurt Üniversitesi</option>
            <option id='İstanbul Gedik Üniversitesi'>İstanbul Gedik Üniversitesi</option>
            <option id='İstanbul Gelişim Üniversitesi'>İstanbul Gelişim Üniversitesi</option>
            <option id='İstanbul Kavram Meslek Yüksekokulu'>İstanbul Kavram Meslek Yüksekokulu</option>
            <option id='İstanbul Kemerburgaz Üniversitesi'>İstanbul Kemerburgaz Üniversitesi</option>
            <option id='İstanbul Kent Üniversitesi'>İstanbul Kent Üniversitesi</option>
            <option id='İstanbul Kültür Üniversitesi'>İstanbul Kültür Üniversitesi</option>
            <option id='İstanbul Medeniyet Üniversitesi'>İstanbul Medeniyet Üniversitesi</option>
            <option id='İstanbul Medipol Üniversitesi'>İstanbul Medipol Üniversitesi</option>
            <option id='İstanbul Rumeli Üniversitesi'>İstanbul Rumeli Üniversitesi</option>
            <option id='İstanbul Sabahattin Zaim Üniversitesi'>İstanbul Sabahattin Zaim Üniversitesi</option>
            <option id='İstanbul Şehir Üniversitesi'>İstanbul Şehir Üniversitesi</option>
            <option id='İstanbul Şişli Meslek Yüksekokulu'>İstanbul Şişli Meslek Yüksekokulu</option>
            <option id='İstanbul Teknik Üniversitesi'>İstanbul Teknik Üniversitesi</option>
            <option id='İstanbul Ticaret Üniversitesi'>İstanbul Ticaret Üniversitesi</option>
            <option id='İstanbul Üniversitesi'>İstanbul Üniversitesi</option>
            <option id='İstanbul Yeni Yüzyıl Üniversitesi'>İstanbul Yeni Yüzyıl Üniversitesi</option>
            <option id='İstinye Üniversitesi'>İstinye Üniversitesi</option>
            <option id='İzmir Bakırçay Üniversitesi'>İzmir Bakırçay Üniversitesi</option>
            <option id='İzmir Demokrasi Üniversitesi'>İzmir Demokrasi Üniversitesi</option>
            <option id='İzmir Ekonomi Üniversitesi'>İzmir Ekonomi Üniversitesi</option>
            <option id='İzmir Katip Çelebi Üniversitesi'>İzmir Katip Çelebi Üniversitesi</option>
            <option id='İzmir Yüksek Teknoloji Enstitüsü'>İzmir Yüksek Teknoloji Enstitüsü</option>
            <option id='Kadir Has Üniversitesi'>Kadir Has Üniversitesi</option>
            <option id='Kafkas Üniversitesi'>Kafkas Üniversitesi</option>
            <option id='Kahramanmaraş Sütçü İmam Üniversitesi'>Kahramanmaraş Sütçü İmam Üniversitesi</option>
            <option id='Kapadokya Üniversitesi'>Kapadokya Üniversitesi</option>
            <option id='Karabük Üniversitesi'>Karabük Üniversitesi</option>
            <option id='Karadeniz Teknik Üniversitesi'>Karadeniz Teknik Üniversitesi</option>
            <option id='Karamanoğlu Mehmetbey Üniversitesi'>Karamanoğlu Mehmetbey Üniversitesi</option>
            <option id='Kastamonu Üniversitesi'>Kastamonu Üniversitesi</option>
            <option id='Kırıkkale Üniversitesi'>Kırıkkale Üniversitesi</option>
            <option id='Kırklareli Üniversitesi'>Kırklareli Üniversitesi</option>
            <option id='Kilis 7 Aralık Üniversitesi'>Kilis 7 Aralık Üniversitesi</option>
            <option id='Kocaeli Üniversitesi'>Kocaeli Üniversitesi</option>
            <option id='Koç Üniversitesi'>Koç Üniversitesi</option>
            <option id='Konya Gıda Ve Tarım Üniversitesi'>Konya Gıda Ve Tarım Üniversitesi</option>
            <option id='Kto Karatay Üniversitesi'>Kto Karatay Üniversitesi</option>
            <option id='Maltepe Üniversitesi'>Maltepe Üniversitesi</option>
            <option id='Manisa Celâl Bayar Üniversitesi'>Manisa Celâl Bayar Üniversitesi</option>
            <option id='Mardin Artuklu Üniversitesi'>Mardin Artuklu Üniversitesi</option>
            <option id='Marmara Üniversitesi'>Marmara Üniversitesi</option>
            <option id='Mef Üniversitesi'>Mef Üniversitesi</option>
            <option id='Mehmet Akif Ersoy Üniversitesi'>Mehmet Akif Ersoy Üniversitesi</option>
            <option id='Melikşah Üniversitesi'>Melikşah Üniversitesi</option>
            <option id='Mersin Üniversitesi'>Mersin Üniversitesi</option>
            <option id='Mimar Sinan Güzel Sanatlar Üniversitesi'>Mimar Sinan Güzel Sanatlar Üniversitesi</option>
            <option id='Muğla Sıtkı Koçman Üniversitesi'>Muğla Sıtkı Koçman Üniversitesi</option>
            <option id='Munzur Üniversitesi'>Munzur Üniversitesi</option>
            <option id='Mustafa Kemal Üniversitesi'>Mustafa Kemal Üniversitesi</option>
            <option id='Muş Alparslan Üniversitesi'>Muş Alparslan Üniversitesi</option>
            <option id='Namık Kemal Üniversitesi'>Namık Kemal Üniversitesi</option>
            <option id='Necmettin Erbakan Üniversitesi'>Necmettin Erbakan Üniversitesi</option>
            <option id='Nevşehir Hacı Bektaş Veli Üniversitesi'>Nevşehir Hacı Bektaş Veli Üniversitesi</option>
            <option id='Niğde Ömer Halisdemir Üniversitesi'>Niğde Ömer Halisdemir Üniversitesi</option>
            <option id='Niğde Üniversitesi'>Niğde Üniversitesi</option>
            <option id='Nişantaşı Üniversitesi'>Nişantaşı Üniversitesi</option>
            <option id='Nuh Naci Yazgan Üniversitesi'>Nuh Naci Yazgan Üniversitesi</option>
            <option id='Okan Üniversitesi'>Okan Üniversitesi</option>
            <option id='Ondokuz Mayıs Üniversitesi'>Ondokuz Mayıs Üniversitesi</option>
            <option id='Ordu Üniversitesi'>Ordu Üniversitesi</option>
            <option id='Orta Doğu Teknik Üniversitesi'>Orta Doğu Teknik Üniversitesi</option>
            <option id='Osmaniye Korkut Ata Üniversitesi'>Osmaniye Korkut Ata Üniversitesi</option>
            <option id='Özyeğin Üniversitesi'>Özyeğin Üniversitesi</option>
            <option id='Pamukkale Üniversitesi'>Pamukkale Üniversitesi</option>
            <option id='Piri Reis Üniversitesi'>Piri Reis Üniversitesi</option>
            <option id='Recep Tayyip Erdoğan Üniversitesi'>Recep Tayyip Erdoğan Üniversitesi</option>
            <option id='Sabancı Üniversitesi'>Sabancı Üniversitesi</option>
            <option id='Sağlık Bilimleri Üniversitesi'>Sağlık Bilimleri Üniversitesi</option>
            <option id='Sakarya Üniversitesi'>Sakarya Üniversitesi</option>
            <option id='Sanko Üniversitesi'>Sanko Üniversitesi</option>
            <option id='Selçuk Üniversitesi'>Selçuk Üniversitesi</option>
            <option id='Siirt Üniversitesi'>Siirt Üniversitesi</option>
            <option id='Sinop Üniversitesi'>Sinop Üniversitesi</option>
            <option id='Süleyman Demirel Üniversitesi'>Süleyman Demirel Üniversitesi</option>
            <option id='Şırnak Üniversitesi'>Şırnak Üniversitesi</option>
            <option id='Ted Üniversitesi'>Ted Üniversitesi</option>
            <option id='Tobb Ekonomi Ve Teknoloji Üniversitesi'>Tobb Ekonomi Ve Teknoloji Üniversitesi</option>
            <option id='Toros Üniversitesi'>Toros Üniversitesi</option>
            <option id='Trakya Üniversitesi'>Trakya Üniversitesi</option>
            <option id='Türk Hava Kurumu Üniversitesi'>Türk Hava Kurumu Üniversitesi</option>
            <option id='Türk-Alman Üniversitesi'>Türk-Alman Üniversitesi</option>
            <option id='Ufuk Üniversitesi'>Ufuk Üniversitesi</option>
            <option id='Uludağ Üniversitesi'>Uludağ Üniversitesi</option>
            <option id='Uşak Üniversitesi'>Uşak Üniversitesi</option>
            <option id='Üsküdar Üniversitesi'>Üsküdar Üniversitesi</option>
            <option id='Yalova Üniversitesi'>Yalova Üniversitesi</option>
            <option id='Yaşar Üniversitesi'>Yaşar Üniversitesi</option>
            <option id='Yeditepe Üniversitesi'>Yeditepe Üniversitesi</option>
            <option id='Yıldız Teknik Üniversitesi'>Yıldız Teknik Üniversitesi</option>
            <option id='Yüksek İhtisas Üniversitesi'>Yüksek İhtisas Üniversitesi</option>
        </select>
        <label>Password</label>
        <input type="password" name="u_password" minlength="<?php $MinPwd?>" maxlength="<?php $MaxPwd?>" required>
    <input type="submit" name="submit" value="Register">
</form>
</div>
</body>
</html>