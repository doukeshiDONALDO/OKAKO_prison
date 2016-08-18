//	<< p873_check.c >>		2011/07 K.Nishi
//	Port_A	: Switch_bord
//	Port_B or PORT_C　: LED_bord
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	int i,aa,bb;
	set_tris_a(0x1f);					//	PORT_A0～A5	input
	set_tris_b(0x00);
	set_tris_c(0x00);
								//	PORT_B&C	output	LED
	output_b(0x00);
	output_c(0x00);
	aa=1;
	while( aa!=0)	{					//	sw0を押したらスタート
		aa=input_a();
		aa=aa&0x01;
	}
	i=0;
	while(1)	{						//	無限ループスタート
		if(i==0)
		{
		bb=0x01;
		}
		output_b(bb);					//	PORT_Bに出力
		output_c(bb);					//	PORT_Cに出力
		delay_ms(300);
		bb<<=1;						//	1ビットシフト
		i++;
		if(i>7)	{i=0;}
	}
}
