FROM yamamuteki/debian-etch-i386

RUN apt-get update

# Add some helper tools
RUN apt-get install -y vim screen wget unzip

# Set up a LAMP stack with PHP4.
# NOTE: mysql-server-4.1 is actually 5.x
#RUN apt-get install -y apache2 php4 mysql-server-4.1 php4-mysql
RUN apt-get install -y apache2 mysql-server-4.1 php5 php5-mysql
RUN touch /etc/apache2/httpd.conf
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
RUN rm /etc/apache2/sites-enabled/000-default
COPY sites-enabled/app /etc/apache2/sites-enabled/app
RUN /etc/init.d/mysql start && echo "CREATE DATABASE app CHARACTER SET utf8 COLLATE utf8_general_ci;" | mysql -u root

# Set up app
COPY . /var/www
WORKDIR /var/www

# Run services
EXPOSE 80
CMD true
CMD /etc/init.d/mysql start && \ 
    mysql app < application/sql/memorize_chinese.sql && \
    apache2ctl -D FOREGROUND
