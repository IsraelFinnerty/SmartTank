sudo apt-get update

#set root password of db
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

# Installing mysql server packages
sudo apt-get install -y mysql-server 

#allow connections from anywhere
sudo sed -i -e 's/127.0.0.1/0.0.0.0/' /etc/mysql/my.cnf
sudo restart mysql
sudo mysql -u root -proot -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%'; FLUSH privileges;"