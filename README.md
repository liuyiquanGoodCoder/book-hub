# 7350GroupWork
# Front End Setup<br/>
1.Download git https://git-scm.com/<br/>
2.git clone https://github.com/liuyiquanGoodCoder/7350GroupWork.git<br/>
3.Download nodeJs v8.12.0  https://nodejs.org/en/<br/>
4.At /front-end ，run npm install<br/>
5.npm run dev<br/>

# Back End Setup<br/>
use laravel link:https://laravel.com/docs/5.7
1.Install Composer https://getcomposer.org/
2.composer global require laravel/installer
3.Make sure to place composer's system-wide vendor bin directory in your $PATH so the laravel executable can be located by your system. This directory exists in different locations based on your operating system; however, some common locations include:

      macOS: $HOME/.composer/vendor/bin
      GNU / Linux Distributions: $HOME/.config/composer/vendor/bin
4.Install Homestead https://laravel.com/docs/5.7/homestead
  git clone https://github.com/laravel/homestead.git ~/Homestead
5.cd ~/Homestead
6.git checkout v7.18.0
7.Once you have cloned the Homestead repository, run the bash init.sh command from the Homestead directory to create the Homestead.yaml configuration file. The Homestead.yaml file will be placed in the Homestead directory:

      // Mac / Linux...
      bash init.sh

      // Windows...
      init.bat
8.Configuring Homestead https://laravel.com/docs/5.7/homestead
