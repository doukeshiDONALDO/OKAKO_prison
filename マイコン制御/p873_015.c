//	<< p873_015.c >>		2012/02 Y.Takada
//	OFLEDπ_³Ήι@Ξ¨Τ¨Β¨Α@κb¨«
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void led_tenmetu(void);
void main(void)
{
	int i,i1,i2,i3,ax,bx;
	set_tris_a(0xff);
	set_tris_b(0x00);				
	output_b(0xff);						//	LEDΑ
	
//	Red
		output_b( 0xdd );
		delay_ms(1000);

//	Green
		output_b( 0xee );
		delay_ms(1000);

//	Blue
		output_b( 0xbb );
		delay_ms(1000);

	output_b( 0xff );
	delay_ms(1000);

}