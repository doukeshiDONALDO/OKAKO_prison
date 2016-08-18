//	<< p873_012.c >>		2012/02 Y.Takada
//	sw‚ª‰Ÿ‚³‚ê‚½‚çLED‚Ì“_–Å‚ğ~‚ß‚é
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
		led_tenmetu();				//	LED“_–Åˆ—‚Ö
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