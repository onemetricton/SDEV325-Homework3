#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <netinet/in.h>

int main(int argc, char *argv[])
{
    struct sockaddr_in server_addr = {AF_INET, htons(6665)};
    int server_skt = socket(AF_INET, SOCK_STREAM, 0);
    char *uname = getenv("USER");
    char message[512];

    strcpy(message,uname);
    strcat(message, ": ");

    inet_pton(AF_INET, "127.0.0.1", &server_addr.sin_addr);
    connect(server_skt, (struct sockaddr *)&server_addr, sizeof(server_addr));

    if (argc > 1) {
        strcat(message, argv[1]);
        send(server_skt, message, strlen(message), 0);
    } else {
        printf("Usage: %s <chat message>\n", argv[0]);
    }


}
