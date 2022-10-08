<center><img src="resource/assets/img/logo-readme.png" style="width:400"></center>

# Tentang Pandoracode

Helper system php yang sudah kami tata dengan sebaik mungkin dan membebaskan anda 
untuk berkreasi dalam membuat sebuah sistem, sangat cocok untuk anda yang mengembangkan sistem 
baik secara solo maupun tim. 




## Fitur

- Mudah dioperasikan
- Koneksi ke database
- Tanpa setting url project
- Perubahan protokol yang mudah
- Hari gini masih ngoding koneksi ke database?, di sini tinggal tap tap
- Kelola table tanpa pindah pindah
- Export table sql/excel
- Import table sql
- Detail table
- Data table
- Membandingkan table dengan 1 klik
- Fitur auth semudah on/off lampu
- Pembuatan controller untuk mengatasi semua kejadian yang terjadi
- Templating tinggal atur folder
- View admin dan frontend pun tinggal pakai
- CRUD?, ngoding?, copas sana sini?, tenang paket CRUD solusinya tinggal pilih table lalu pilih controller cling sudah jadi
- Datatable view admin panel sudah di build up dengan tambahan export excel pada setiap tablenya
- API(Beta)

Ini saja?, masih banyak lagi kalau anda penasaran tinggal clone lho
## Instalasi

Untuk instalasi, anda bisa mengikuti langkah-langkah berikut.

```sh
cd direktori
git clone https://gitlab.com/pandoradevofficial/pandoracode-phoenix.git
```

## Protokol Http / Https

Kami sarankan anda untuk mengatur protokol di file :

`app/config-project.php`

Di file tersebut kami sudah mengatur variable `$protokol` sebagai `http`, anda bisa
mengganti sesuai kebutuhan.

## Pembaruan Route API & Web di Pandoracode versi 3

Anda bisa membangun url / rute anda sendiri dan semua url request / response bisa anda akomodir.
Kami menyediakan untuk response / request di bagian file `routes/api.php`, kemudian untuk views sebaiknya anda
menggunakkan file `routes/web.php`.

Untuk API:

```sh
Api::url('url_anda','ControllerName@Function');
```

Untuk Web:

```sh
Web::url('url_anda','ControllerName@Function');
```

#### Hubungi Kami

[Pandoradev Official](mailto:pandoradevofficial@gmail.com)

**Happy Coding!**

