# php-starter
> Simple PHP Framework

## Installation
หลังจาก clone project แล้ว ให้ใช้คำสั่งต่อไปนี้
```bash
cd php-starter
composer install
cp .env.example .env
```
จากนั้นเปลี่ยน document root มาที่ directory `public/`

## Dependencies 
* doctrine/inflector 1.3
    * The Doctrine Inflector has static methods for inflecting text. The features include pluralization, singularization, converting between camelCase and under_score and capitalizing words.
    * [Document](https://www.doctrine-project.org/projects/doctrine-inflector/en/1.3/index.html)
* vlucas/phpdotenv 3.4
    * Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.
    * [Github](https://github.com/vlucas/phpdotenv)
* league/plates 3.3
    * Native PHP Template System
    * [platesphp.com](https://platesphp.com/)
    * folder `resources/views/`

## `.env` file  
```dotenv
DB_HOST=localhost
DB_NAME=your-database-name
DB_USER=your-db-username
DB_PASSWORD=your-secret
```

## Change document root to directory `public/`
* apache virtual host
```apacheconfig
<VirtualHost *:80> 
    DocumentRoot "/part/to/php-starter/public/"
    ServerName php-starter.test
    ServerAlias *.php-starter.test
    <Directory "/part/to/php-starter/public/">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## Request URI
`host:port/{controllerName}/{methodName}/params...?query=...`

## Directory Structure
* `config/`  เก็บ configuration file ที่ใช้กำหนดค่าต่าง ๆ ในโปรเจค โดยมีไฟล์ดังนี้
  * `app.php` กำหนด default controller/method และ title
    > default controller จะถูกเรียก เมื่อไม่ระบุ controller ใน Request URI
    >
    > default method จะถูกเรียก เมื่อไม่ระบุ method ใน Request URI
  * `database.php` กำหนดค่าที่ใช้เชื่อมต่อกับฐานข้อมูล
* `public/` กำหนดให้เป็น document root ของ project 
  > เมื่อมีการ request จาก client แล้ว จะเริ่มหา resource จาก directory public/ ก่อน
  >
  > หากไม่พบ จะเปลี่ยน URI เป็นรูปแบบ `/{controllerName}/{methodName}/params...?query=...` 
  >
  > ดังนั้น Static Files ต่าง ๆ เช่น CSS, JS, Images ให้นำมาไว้ที่ `public/` 
* `resources/` เก็บไฟล์ที่ต้องมีการประมวลผลก่อน เช่น sass, plates
  * `views` เก็บไฟล์ plates [platesphp.com](https://platesphp.com/)
* `src/` เป็น application source root เก็บ PHP Classes
  (namespace `App`)
  * `Controllers` เก็บ Controller Classes ของโปรเจค (namespace `App\Controllers`)
  * `Framework` (namespace `App\Framework`) เก็บคลาสที่เขียนไว้ให้แล้ว ได้แก่ 
    * คลาสเกี่ยวกับการเชื่อมต่อฐานข้อมูล (`App\Framework\Connection`) 
    * คลาสอรรถประโยชน์ (`App\Framework\Utilities`)
  * `Models` เก็บ Model Classes ที่เป็น ORM ของตารางในฐานข้อมูล (namespace `App\Models`)