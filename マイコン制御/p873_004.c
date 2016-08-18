//	<< p873_004.c >>		2012/02 Y.Takada
//	Port_Bに接続されているLEDをｰ128から127まで順番に点灯
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	signed int i;
	set_tris_b(0x00);				
	output_b(0x00);
	
	for(i=-128;i<=128;i++)	{					
		output_b(i);						
		delay_ms(50);					//	50ms待つ
						
	}
}