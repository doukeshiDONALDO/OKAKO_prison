//	<< p873_012.c >>		2012/02 Y.Takada
//	swが押されたらLEDの点滅を止める
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void led_tenmetu(void);
void main(void)
{
	int a0,i;
	set_tris_a(0x1f);
	set_tris_b(0x00);					
	output_b(0x00);
	
	a0 = 1;
	while( a0 != 0 )	{
		led_tenmetu();				//	LED点滅処理へ
		a0 = input_a() & 0x01;
	}
}
void led_tenmetu()
{
	output_b(0xff);
	delay_ms(300);
	output_b(0x00);
	delay_ms(300);
}	