//	<< p873_003.c >>		2012/02 Y.Takada
//	Port_Bに接続されているLEDを0から128まで順番に店頭
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	int i;
	set_tris_b(0x00);					
	output_b(0x00);
	
	for(i=0;i<=128;i++)	{				//	{}内の処理を129回繰り返す	
		output_b(i);					//	i -> PORT_B	
		delay_ms(100);					//	100ms待つ
						
	}
}