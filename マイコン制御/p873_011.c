//	<< p873_011.c >>		2012/02 Y.Takada
//	swが押されたらLEDを10回点滅させる
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	int a0,i;
	set_tris_a(0x1f);
	set_tris_b(0x00);					
	output_b(0x00);
	
	a0 = 1;
	while( a0 != 0 )	{				// swが押されるまで繰り返し	
		a0 = input_a() & 0x01;				// PORT_Aを0x01でANDマスクしてa0へ代入
	}
	for(i=0;i<10;i++)	{
		output_b(0xff);
		delay_ms(800);
		output_b(0x00);
		delay_ms(800);
	}
}	