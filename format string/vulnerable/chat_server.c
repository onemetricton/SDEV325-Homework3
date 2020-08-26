#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <netinet/in.h>

int main(int argc, char *argv[])
{
	struct sockaddr_in server_addr = {AF_INET, htons(6665), INADDR_ANY};
	int server_skt = socket(AF_INET, SOCK_STREAM, 0);
	int client_skt;
	char message[512];
	
	bind(server_skt, (struct sockaddr *)&server_addr, sizeof(server_addr));
	listen(server_skt, 12);
	
	while(client_skt = accept(server_skt, (struct sockaddr *)NULL, NULL)) {
    	int pid;
    	if((pid = fork()) == 0) {
	        while (recv(client_skt, message, 4096, 0)>0) {
	        	//*
	        	printf(message);
	        	printf("\n");
	        	/*/
            	printf("%s\n", message);
            	*/
            	strcpy(message,"");
        	}
        	exit(0);
    	}
	}
}
