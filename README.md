# Bus Stop Search v1.0

![alt text](https://raw.githubusercontent.com/inon/bus-app/master/public/image/demo.png)

Features
----------

This project uses [MyTransportSG](https://www.mytransport.sg/content/mytransport/home/dataMall.html) API in getting bus stops, arrival time details.

**Feature #1:** "Near Me" - returns bus stops near you within 5km from the coordinates retrieved from `navigator.geolocation`

**Feature #2.** "Road NameSearch" - returns bus stops based on the road/place specified



Build/Install
----------

1). Clone: `git clone git@github.com:inon/recipe-builder.git`

2). `composer install`

3). `yarn install` Kindly use "npm install" for VMs hosted under windows machine. Yarn has a known issue for VMs hosted in windows.

4). Copy `.env.example` into a `.env` file. I've included my own API key - I recommend to create your own [here](https://www.mytransport.sg/content/mytransport/home/dataMall.html) :-P

5). Create `bus_service` database

6). `php artisan migrate`

7). `php artisan db:seed` will call `BusStopTableSeeder` that will make an API and get 500 bus stops from [MyTransportSG API](https://www.mytransport.sg/content/mytransport/home/dataMall.html)

8). `php artisan serve` Though highly recommend to setup proper VM instead. Host it in `laravel/homestead`, `Vagrant`


Troubleshooting
----------
- `navigator.geolocation` is only enabled in `https` [details](https://sites.google.com/a/chromium.org/dev/Home/chromium-security/deprecating-powerful-features-on-insecure-origins), kindly enable ssl


RoadMap
----------
**v2.0**

- Intended not to include "Add Bus Stop" module since this project uses MyTransportSG API already. Will create this in v2.0 :)
- Feature/Unit testing
- Google Maps integration