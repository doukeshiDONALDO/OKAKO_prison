//	<< p873_016.c >>		2012/02 Y.Takada
//	三色LEDを転倒させる　赤→黄→緑→水色→青→紫→白　一秒おき　
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void led_tenmetu(void);
void main(void)
{
	int i,i1,i2,i3,ax,bx;
	long const clb[7] = { 0xdd, 0xcc, 0xee, 0xaa, 0xbb, 0x99, 0x88 };
	set_tris_a(0xff);
	set_tris_b(0x00);					//	PORT_B		output	LED
	output_b(0xff);
	
	while (1) {
	i = 0;
		while ( i != 7 ) {
			output_b( clb[i] );
			delay_ms(1000);
			i++;
		}
	}
}