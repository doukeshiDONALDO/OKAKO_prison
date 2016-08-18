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
	long const clb[10] = { 0xc0, 0xf9, 0xa4, 0xb0, 0x99, 0x8c, 0x8e, 0xcc, 0x80, 0x7c };
	set_tris_a(0xff);
	set_tris_b(0x00);					
	output_b(0xff);
	
	i = 0;
	ax = 1;
	while (1) {
		ax = input_a() & 0x01;
		if( ax != 1 ) {
			output_b( clb[i] );
			delay_ms(500);
			i++;
			ax = 1;
			if( i == 10 ) {
				i = 0;
			}
		}
	}
}