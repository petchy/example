## ขั้นตอนติดตั้ง program

- Clone โปรเจคลงในเครื่อง ```git clone https://github.com/petchy/example.git```
- run คำสั่ง ```composer install``` เพื่อติดตั้ง laravel
- สร้าง file .env ปรับ config ให้ตรงกับ database ในเครื่อง
- run คำสั่ง ```php artisan key:generate``` เพื่อสร้าง APP_KEY
- run คำสั่ง ```php artisan passport:install```
- run คำสั่ง ```php artisan migrate``` เพื่อสร้างข้อมูลใน database
- run คำสั่ง ```php artisan storage:link```
- run คำสั่ง ```php artisan serve``` สำหรับ start server

## ข้อสอบ
- Api Login เข้าผ่าน [http://127.0.0.1:8000/api/login](http://127.0.0.1:8000/api/login)
- Api Register เข้าผ่าน [http://127.0.0.1:8000/api/register](http://127.0.0.1:8000/api/register)
- Api Upload รูปภาพ เข้าผ่าน [http://127.0.0.1:8000/api/upload](http://127.0.0.1:8000/api/upload)
- คำนวณผลลัพธ์ใบเสนอราคา เข้าผ่าน [http://127.0.0.1:8000/quotation](http://127.0.0.1:8000/quotation)