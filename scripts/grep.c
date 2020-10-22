#include<stdio.h>
#include<string.h>

void main(int argc , char *argv[])
{
               FILE *fp;
	       int flag = 0;
               char line[600];

              // initialsing the file pointer to read
              fp = fopen(argv[2],"r");
   
             // reading line by line and comparing each word in line
             while(fscanf(fp , "%[^\n]\n" , line)!=EOF && flag ==0)
            {
                      if(strstr(line , argv[1]) !=NULL)
                     {
                             // print that line
                             printf("%s\n" , line);
			     flag = 1;
                      }
                     else
                    {
                            continue;
                    }
           }
            fclose(fp);
}
