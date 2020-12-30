# Camagru
Camagru is a web application similar to instagram that is used for uploading and sharing images.
# Requirements
1) PHP

2) MAMP

3) Javascript

4) CSS

5) HTML

7) MySQL
# Application setup
1) Install the Bitnami MAMP stack (This step depends on your operating system, so ill be using the XAMPP stack because I'm on windows)

2) Clear out the htdocs folder

3) Clone this repository into the htdocs folder

4) Configure your MySQL to use these default credentials. But dont forget to change it later as this is not advised.

   User: root, password: ''
  
5) Next you need to create the database with the following link [http://localhost/Config/setup_db.php](http://localhost/Config/setup_db.php)

6) Next you need to setup the necessary directories that camagru needs by clicking on this link [http://localhost/create_directories.php](http://localhost/create_directories.php)

7) Register an account on camagru and verify your account

8) Login and you all done !


# File structure
```bash
.
├── CSS                                                            # This is the directory where i store all my CSS files
│   ├── comment_likes.css
│   ├── edit_info.css
│   ├── my_gallery.css
│   ├── pagination.css
│   ├── process_tmp_img.css
│   └── webcam.css
├── Config                                                         # This is the directory where a store my configuration files 
│   ├── database.php
│   ├── setup_backup.php
│   └── setup_db.php
├── Pictures                                                       # This is an asset directory where i store all png's that are used in Camagru
│   ├── Logo.png
│   ├── Untitled.png
│   ├── gallery.png
│   ├── heart.png
│   ├── trash.png
│   ├── —Pngtree—camera glyph black icon_3754744.png
│   └── —Pngtree—file upload icon_4646955.png
├── stickers                                                       # This directory is used to store the stickers that will be used in the image editor
│   ├── stickers_1.png
│   ├── stickers_2.png
│   └── stickers_3.png
├── README.md                                                      # All the files after this README.md file are the php files
├── author
├── Auth.php
├── check.php
├── comment_likes.php
├── confirmation.php
├── connect.php
├── create.php
├── create_directories.php
├── edit_info.php
├── favicon.ico
├── filter_1.php
├── forgot_password.php
├── index.php
├── link_pass.php
├── log_user_off.php
├── loggedon.php
├── login.php
├── my_gallery.php
├── pagination.php
├── pagination_2.php
├── pass_auth.php
├── pass_reset.php
├── photo.js
├── process_img.php
├── process_tmp_img.php
├── reset.php
├── sign_up.php
├── signup_02.php
├── signup_03.php
├── test.php
├── upload.php
├── upload_2.php
├── user_gallery.php
├── verified.php
└── webcam.php
```
