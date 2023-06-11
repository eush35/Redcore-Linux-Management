# Redcore Linux Management Panel
[EN]
It is a web-based interface application developed for Linux operating systems. With this application, you can provide the management of your server by throwing files directly into the apache server without installing any agents. I would like to inform you that it is under development and innovations will be added. Those who want to support me in my project emreugurbusiness@gmail.com they can contact you at his address.

[TR]
Linux işletim sistemleri için geliştirilmiş bir web taraflı arayüz uygulamasıdır. Bu uygulama ile herhangi ajan kurulumu yapmadan doğrudan dosyaları apache sunucusunun içine atarak sunucunuzun yönetimini sağalyabilirsiniz. Geliştirilme aşamasında olup yenilikler ekleneceği bilgisini vermek isterim. Projemde bana destek olmak isteyenler emreugurbusiness@gmail.com adresinden iletişime geçebilirler.

## Screenshots

![App Screenshot](https://redhopecommunity.com/dashboard.png)


## Requirements [Gerekli Yazılımlar]

Software required for the operation of the project

`PHP 8.0 or Higher`

`NodeJS v12 or Higher `

`NPM v8 or Higher `

`MySQL Server 8`



## Installation Instructions [Kurulum Talimatları]

[TR]
Git ile indirilen dosyayı apache sunucumuzun içerisine atacak ve a2ensite ile aktif edebilirsiniz.

[EN] You will upload the downloaded file with Git to our apache server and activate it with a2ensite.

```bash
  git clone https://github.com/eush35/Redcore-Linux-Management
```

```bash
  cd redcore
```

```bash
  chmod +x start.sh && chmod +x stop.sh
```

```bash
  bash start.sh
```
    
## User Login

#### Login

```http
  http://youraddress.com:accessport
```

| Username | Password     | Description                |
| :-------- | :------- | :------------------------- |
| `admin` | `123456789` | **Change This**. for Security |




