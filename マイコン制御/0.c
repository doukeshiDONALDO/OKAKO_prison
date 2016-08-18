//	<< p873_001.c >>		2012/02 Y.Takada
//	Por_Bに接続されているLEDを全て点灯
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	set_tris_b(0x00);					//	PORT_B0～B7	output
	output_b(0x00);						//	0x00 -> PORT_B
	
	while(1)	{					//	無限ループ
		output_b(0xff);	
		delay_ms(500);				//	0xFF -> PORT_B
		output_b(0xff~)				
	}
}