//	<< p873_013.c >>		2012/02 Y.Takada
//	sw0�������ꂽ��LED���E��]������
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void led_tenmetu(void);
void main(void)
{
	int i,aa,bb;
	set_tris_a(0x1f);
	set_tris_b(0x00);					
	output_b(0x00);
	
	aa = 1;
	while( aa != 0 )	{
		aa = input_a() & 0x01;
	}
	i = 0;
	bb = 0x80;
	while(1)	{
		if( i >=  0 )	{
			output_b(bb^0xff);
			delay_ms(300);
			bb >>= 1;
			i++;
		}
		if( i > 7 )	{
			i = 0;
			bb = 0x80;
		}
	}
}	