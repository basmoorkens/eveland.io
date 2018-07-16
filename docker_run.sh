sudo docker stop eveland_io-nginx
sudo docker rm eveland_io-nginx
sudo docker run --name="eveland_io-nginx" -p 80:80 -d eveland_io
