sudo docker stop eveland_io
sudo docker rm eveland_io
sudo docker run --name="eveland_io-nginx" -p 80:80 -d eveland_io
