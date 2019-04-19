build:
	docker build --no-cache -t oinker-admin .
 
run:
	docker run -d -p 4080:80 --name oinker-admin ubuntu

clean:
	docker stop oinker-admin && docker rm oinker-admin -v